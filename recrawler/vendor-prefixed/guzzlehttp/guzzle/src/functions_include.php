<?php

namespace Mihdan\ReCrawler\Dependencies;

// Don't redefine the functions if included multiple times.
if (!\function_exists('Mihdan\\ReCrawler\\Dependencies\\GuzzleHttp\\describe_type')) {
    require __DIR__ . '/functions.php';
}
