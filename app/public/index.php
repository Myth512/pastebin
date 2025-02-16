<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use App\App;
use App\Controllers\HomeController;
use App\Controllers\PasteController;
use App\Router;

define('VIEW_PATH', dirname(__DIR__) . '/src/Views/');
define('UPLOAD_PATH', dirname(__DIR__) . '/uploads/');

$router = new Router([PasteController::class, 'index']);
$router->post('/paste', [PasteController::class, 'store']);
$router->get('/', [HomeController::class, 'index']);

$app = new App($router);
$app->run();
