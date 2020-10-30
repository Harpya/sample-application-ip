<?php

$router->map('GET', '/info', function () {
    phpinfo();
    exit;
});

$router->map('GET', '/', function () {
    require_once __DIR__ . '/../views/welcome.phtml';
});
