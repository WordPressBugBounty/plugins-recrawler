<?php

/*
 * Copyright 2015 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Mihdan\ReCrawler\Dependencies\Google\Auth\Subscriber;

use Mihdan\ReCrawler\Dependencies\Google\Auth\CacheTrait;
use Mihdan\ReCrawler\Dependencies\GuzzleHttp\Event\BeforeEvent;
use Mihdan\ReCrawler\Dependencies\GuzzleHttp\Event\RequestEvents;
use Mihdan\ReCrawler\Dependencies\GuzzleHttp\Event\SubscriberInterface;
use Mihdan\ReCrawler\Dependencies\Psr\Cache\CacheItemPoolInterface;
/**
 * ScopedAccessTokenSubscriber is a Guzzle Subscriber that adds an Authorization
 * header provided by a closure.
 *
 * The closure returns an access token, taking the scope, either a single
 * string or an array of strings, as its value.  If provided, a cache will be
 * used to preserve the access token for a given lifetime.
 *
 * Requests will be accessed with the authorization header:
 *
 * 'authorization' 'Bearer <access token obtained from the closure>'
 */
class ScopedAccessTokenSubscriber implements SubscriberInterface
{
    use CacheTrait;
    const DEFAULT_CACHE_LIFETIME = 1500;
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;
    /**
     * @var callable The access token generator function
     */
    private $tokenFunc;
    /**
     * @var array|string The scopes used to generate the token
     */
    private $scopes;
    /**
     * @var array
     */
    private $cacheConfig;
    /**
     * Creates a new ScopedAccessTokenSubscriber.
     *
     * @param callable $tokenFunc a token generator function
     * @param array|string $scopes the token authentication scopes
     * @param array $cacheConfig configuration for the cache when it's present
     * @param CacheItemPoolInterface $cache an implementation of CacheItemPoolInterface
     */
    public function __construct(callable $tokenFunc, $scopes, array $cacheConfig = null, CacheItemPoolInterface $cache = null)
    {
        $this->tokenFunc = $tokenFunc;
        if (!(\is_string($scopes) || \is_array($scopes))) {
            throw new \InvalidArgumentException('wants scope should be string or array');
        }
        $this->scopes = $scopes;
        if (!\is_null($cache)) {
            $this->cache = $cache;
            $this->cacheConfig = \array_merge(['lifetime' => self::DEFAULT_CACHE_LIFETIME, 'prefix' => ''], $cacheConfig);
        }
    }
    /**
     * @return array
     */
    public function getEvents()
    {
        return ['before' => ['onBefore', RequestEvents::SIGN_REQUEST]];
    }
    /**
     * Updates the request with an Authorization header when auth is 'scoped'.
     *
     * E.g this could be used to authenticate using the AppEngine AppIdentityService.
     *
     * Example:
     * ```
     * use google\appengine\api\app_identity\AppIdentityService;
     * use Google\Auth\Subscriber\ScopedAccessTokenSubscriber;
     * use GuzzleHttp\Client;
     *
     * $scope = 'https://www.googleapis.com/auth/taskqueue'
     * $subscriber = new ScopedAccessToken(
     *     'AppIdentityService::getAccessToken',
     *     $scope,
     *     ['prefix' => 'Google\Auth\ScopedAccessToken::'],
     *     $cache = new Memcache()
     * );
     *
     * $client = new Client([
     *     'base_url' => 'https://www.googleapis.com/taskqueue/v1beta2/projects/',
     *     'defaults' => ['auth' => 'scoped']
     * ]);
     * $client->getEmitter()->attach($subscriber);
     *
     * $res = $client->get('myproject/taskqueues/myqueue');
     * ```
     *
     * @param BeforeEvent $event
     */
    public function onBefore(BeforeEvent $event)
    {
        // Requests using "auth"="scoped" will be authorized.
        $request = $event->getRequest();
        if ($request->getConfig()['auth'] != 'scoped') {
            return;
        }
        $auth_header = 'Bearer ' . $this->fetchToken();
        $request->setHeader('authorization', $auth_header);
    }
    /**
     * @return string
     */
    private function getCacheKey()
    {
        $key = null;
        if (\is_string($this->scopes)) {
            $key .= $this->scopes;
        } elseif (\is_array($this->scopes)) {
            $key .= \implode(':', $this->scopes);
        }
        return $key;
    }
    /**
     * Determine if token is available in the cache, if not call tokenFunc to
     * fetch it.
     *
     * @return string
     */
    private function fetchToken()
    {
        $cacheKey = $this->getCacheKey();
        $cached = $this->getCachedValue($cacheKey);
        if (!empty($cached)) {
            return $cached;
        }
        $token = \call_user_func($this->tokenFunc, $this->scopes);
        $this->setCachedValue($cacheKey, $token);
        return $token;
    }
}
