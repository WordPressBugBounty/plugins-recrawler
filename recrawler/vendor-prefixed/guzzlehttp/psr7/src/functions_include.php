<?php

namespace Mihdan\ReCrawler\Dependencies;

// Don't redefine the functions if included multiple times.
if (!\function_exists('Mihdan\\ReCrawler\\Dependencies\\GuzzleHttp\\Psr7\\str')) {
    require __DIR__ . '/functions.php';
}
