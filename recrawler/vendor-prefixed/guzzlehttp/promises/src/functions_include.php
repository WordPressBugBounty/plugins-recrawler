<?php

namespace Mihdan\ReCrawler\Dependencies;

// Don't redefine the functions if included multiple times.
if (!\function_exists('Mihdan\\ReCrawler\\Dependencies\\GuzzleHttp\\Promise\\promise_for')) {
    require __DIR__ . '/functions.php';
}
