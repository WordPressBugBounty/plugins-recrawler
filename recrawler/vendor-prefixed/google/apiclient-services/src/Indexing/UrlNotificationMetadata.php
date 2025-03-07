<?php

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */
namespace Mihdan\ReCrawler\Dependencies\Google\Service\Indexing;

class UrlNotificationMetadata extends \Mihdan\ReCrawler\Dependencies\Google\Model
{
    protected $latestRemoveType = UrlNotification::class;
    protected $latestRemoveDataType = '';
    protected $latestUpdateType = UrlNotification::class;
    protected $latestUpdateDataType = '';
    /**
     * @var string
     */
    public $url;
    /**
     * @param UrlNotification
     */
    public function setLatestRemove(UrlNotification $latestRemove)
    {
        $this->latestRemove = $latestRemove;
    }
    /**
     * @return UrlNotification
     */
    public function getLatestRemove()
    {
        return $this->latestRemove;
    }
    /**
     * @param UrlNotification
     */
    public function setLatestUpdate(UrlNotification $latestUpdate)
    {
        $this->latestUpdate = $latestUpdate;
    }
    /**
     * @return UrlNotification
     */
    public function getLatestUpdate()
    {
        return $this->latestUpdate;
    }
    /**
     * @param string
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
// Adding a class alias for backwards compatibility with the previous class name.
\class_alias(UrlNotificationMetadata::class, 'Mihdan\\ReCrawler\\Dependencies\\Google_Service_Indexing_UrlNotificationMetadata');
