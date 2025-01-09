<?php

// Google API Client Library
// require_once __DIR__ . '/google-api-php-client/src/Google/autoload.php';
require_once __DIR__ . '/google-api-php-client/vendor/autoload.php';

// Guzzle HTTP Client (if required by Google API)
if (file_exists(__DIR__ . '/guzzlehttp/guzzle/src/functions_include.php')) {
    require_once __DIR__ . '/guzzlehttp/guzzle/src/functions_include.php';
}

// Monolog Logger (if required by Google API)
if (file_exists(__DIR__ . '/monolog/monolog/src/Monolog/Logger.php')) {
    require_once __DIR__ . '/monolog/monolog/src/Monolog/Logger.php';
}

// Add more dependencies as needed
