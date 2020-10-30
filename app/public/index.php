<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use \Harpya\SDK\IdentityProvider\Utils;
use \Harpya\SDK\IdentityProvider\Broker;
use \Harpya\SDK\Constants;

/**
 * Load ENV variables
 */
if (file_exists(__DIR__ . '/../')) {
    Dotenv::createImmutable(__DIR__ . '/../')->load();
}

$router = new AltoRouter();

$lsRouteFiles = glob(__DIR__ . '/../routes/*.php');

foreach ($lsRouteFiles as $routeFileName) {
    require_once $routeFileName;
}

$match = $router->match();

try {
    if (is_array($match) && is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
        // no route was matched
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    }
} catch (\Exception $ex) {
    echo 'Error: ' . $ex->getMessage();
}
