<?php

namespace Mihdan\ReCrawler\Dependencies\GuzzleHttp;

use Mihdan\ReCrawler\Dependencies\Psr\Http\Message\MessageInterface;
interface BodySummarizerInterface
{
    /**
     * Returns a summarized message body.
     */
    public function summarize(MessageInterface $message) : ?string;
}
