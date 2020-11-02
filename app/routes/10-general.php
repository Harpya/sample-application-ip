<?php

$router->map('GET', '/info', function () {
    phpinfo();
    exit;
});

$router->map('GET', '/', function () {
    $index = new Harpya\demo\Controllers\Index();
    $index->welcome();
    // require_once __DIR__ . '/../views/welcome.phtml';
});

$router->map('GET', '/logout', function () {
    $index = new Harpya\demo\Controllers\Index();
    $index->logout();
    // require_once __DIR__ . '/../views/welcome.phtml';
});

$router->map('POST', '/login', function () {
    $index = new Harpya\demo\Controllers\Index();
    $index->fakeLogin($_POST['email']);
    // require_once __DIR__ . '/../views/welcome.phtml';
});

$router->map('GET', '/profile', function () {
    $index = new Harpya\demo\Controllers\Index();
    $index->showProfile();
    // require_once __DIR__ . '/../views/welcome.phtml';
});
