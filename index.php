<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Application;

$app = new Application();

$app->router->get('/', function() {
    return "HOME IEBT PHP";
});

$app->router->get('/iebt', function() {
    return "IEBT INNOVATION";
});

$app->router->get('/php', function() {
    return "PHP É O PAI";
});
    
$app->router->get('/laravel', function() {
    return "LARAVEL É BRABO";
});

$app->run();