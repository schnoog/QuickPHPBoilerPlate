<?php

require(__DIR__ . "/vendor/autoload.php");
$selphp = "Nothing";

$router = new \Delight\Router\Router();

$router->get('/', function () {
    global $selphp;
    $selphp = __DIR__ . '/index.php';
    require_once $selphp;

});

$router->get('/index', function () {
    global $selphp;
    $selphp = __DIR__ . '/index.php';
    require_once $selphp;

});


