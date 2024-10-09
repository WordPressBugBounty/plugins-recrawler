<?php

namespace Mihdan\ReCrawler\Dependencies;

if (\class_exists('Mihdan\\ReCrawler\\Dependencies\\Google_Client', \false)) {
    // Prevent error with preloading in PHP 7.4
    // @see https://github.com/googleapis/google-api-php-client/issues/1976
    return;
}
$classMap = ['Mihdan\\ReCrawler\\Dependencies\\Google\\Client' => 'Mihdan\\ReCrawler\\Dependencies\Google_Client', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Service' => 'Mihdan\\ReCrawler\\Dependencies\Google_Service', 'Mihdan\\ReCrawler\\Dependencies\\Google\\AccessToken\\Revoke' => 'Mihdan\\ReCrawler\\Dependencies\Google_AccessToken_Revoke', 'Mihdan\\ReCrawler\\Dependencies\\Google\\AccessToken\\Verify' => 'Mihdan\\ReCrawler\\Dependencies\Google_AccessToken_Verify', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Model' => 'Mihdan\\ReCrawler\\Dependencies\Google_Model', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Utils\\UriTemplate' => 'Mihdan\\ReCrawler\\Dependencies\Google_Utils_UriTemplate', 'Mihdan\\ReCrawler\\Dependencies\\Google\\AuthHandler\\Guzzle6AuthHandler' => 'Mihdan\\ReCrawler\\Dependencies\Google_AuthHandler_Guzzle6AuthHandler', 'Mihdan\\ReCrawler\\Dependencies\\Google\\AuthHandler\\Guzzle7AuthHandler' => 'Mihdan\\ReCrawler\\Dependencies\Google_AuthHandler_Guzzle7AuthHandler', 'Mihdan\\ReCrawler\\Dependencies\\Google\\AuthHandler\\Guzzle5AuthHandler' => 'Mihdan\\ReCrawler\\Dependencies\Google_AuthHandler_Guzzle5AuthHandler', 'Mihdan\\ReCrawler\\Dependencies\\Google\\AuthHandler\\AuthHandlerFactory' => 'Mihdan\\ReCrawler\\Dependencies\Google_AuthHandler_AuthHandlerFactory', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Http\\Batch' => 'Mihdan\\ReCrawler\\Dependencies\Google_Http_Batch', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Http\\MediaFileUpload' => 'Mihdan\\ReCrawler\\Dependencies\Google_Http_MediaFileUpload', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Http\\REST' => 'Mihdan\\ReCrawler\\Dependencies\Google_Http_REST', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Task\\Retryable' => 'Mihdan\\ReCrawler\\Dependencies\Google_Task_Retryable', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Task\\Exception' => 'Mihdan\\ReCrawler\\Dependencies\Google_Task_Exception', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Task\\Runner' => 'Mihdan\\ReCrawler\\Dependencies\Google_Task_Runner', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Collection' => 'Mihdan\\ReCrawler\\Dependencies\Google_Collection', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Service\\Exception' => 'Mihdan\\ReCrawler\\Dependencies\Google_Service_Exception', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Service\\Resource' => 'Mihdan\\ReCrawler\\Dependencies\Google_Service_Resource', 'Mihdan\\ReCrawler\\Dependencies\\Google\\Exception' => 'Mihdan\\ReCrawler\\Dependencies\Google_Exception'];
foreach ($classMap as $class => $alias) {
    \class_alias($class, $alias);
}
/**
 * This class needs to be defined explicitly as scripts must be recognized by
 * the autoloader.
 */
class Google_Task_Composer extends \Mihdan\ReCrawler\Dependencies\Google\Task\Composer
{
}
if (\false) {
    class Google_AccessToken_Revoke extends \Mihdan\ReCrawler\Dependencies\Google\AccessToken\Revoke
    {
    }
    class Google_AccessToken_Verify extends \Mihdan\ReCrawler\Dependencies\Google\AccessToken\Verify
    {
    }
    class Google_AuthHandler_AuthHandlerFactory extends \Mihdan\ReCrawler\Dependencies\Google\AuthHandler\AuthHandlerFactory
    {
    }
    class Google_AuthHandler_Guzzle5AuthHandler extends \Mihdan\ReCrawler\Dependencies\Google\AuthHandler\Guzzle5AuthHandler
    {
    }
    class Google_AuthHandler_Guzzle6AuthHandler extends \Mihdan\ReCrawler\Dependencies\Google\AuthHandler\Guzzle6AuthHandler
    {
    }
    class Google_AuthHandler_Guzzle7AuthHandler extends \Mihdan\ReCrawler\Dependencies\Google\AuthHandler\Guzzle7AuthHandler
    {
    }
    class Google_Client extends \Mihdan\ReCrawler\Dependencies\Google\Client
    {
    }
    class Google_Collection extends \Mihdan\ReCrawler\Dependencies\Google\Collection
    {
    }
    class Google_Exception extends \Mihdan\ReCrawler\Dependencies\Google\Exception
    {
    }
    class Google_Http_Batch extends \Mihdan\ReCrawler\Dependencies\Google\Http\Batch
    {
    }
    class Google_Http_MediaFileUpload extends \Mihdan\ReCrawler\Dependencies\Google\Http\MediaFileUpload
    {
    }
    class Google_Http_REST extends \Mihdan\ReCrawler\Dependencies\Google\Http\REST
    {
    }
    class Google_Model extends \Mihdan\ReCrawler\Dependencies\Google\Model
    {
    }
    class Google_Service extends \Mihdan\ReCrawler\Dependencies\Google\Service
    {
    }
    class Google_Service_Exception extends \Mihdan\ReCrawler\Dependencies\Google\Service\Exception
    {
    }
    class Google_Service_Resource extends \Mihdan\ReCrawler\Dependencies\Google\Service\Resource
    {
    }
    class Google_Task_Exception extends \Mihdan\ReCrawler\Dependencies\Google\Task\Exception
    {
    }
    interface Google_Task_Retryable extends \Mihdan\ReCrawler\Dependencies\Google\Task\Retryable
    {
    }
    class Google_Task_Runner extends \Mihdan\ReCrawler\Dependencies\Google\Task\Runner
    {
    }
    class Google_Utils_UriTemplate extends \Mihdan\ReCrawler\Dependencies\Google\Utils\UriTemplate
    {
    }
}
