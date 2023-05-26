<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Helpers/helper.php';
header('Content-Type: application/json');

use App\Core\Application;
use App\Core\Response;
use App\Controllers\HomeController;

$app = new Application();
$response = new Response();

$app->router->get("/home", [ new HomeController(), 'get' ]);
$app->router->post("/home", [ new HomeController(), 'post' ]);

$app->run();
