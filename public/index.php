<?php

use App\Config;
use App\Router;
use App\Controllers;
use App\Controllers\Api;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

const VIEW_PATH = __DIR__ . '/../views';
const LAYOUT_VIEW_PATH = __DIR__ . '/../views' . '/layout.php';


$router = new App\Router();
$routerAPI = new App\RouterAPI();

$router
    ->get('/', [App\Controllers\Api\HomeController::class, 'check']);


$routerAPI
    ->get('/api', [App\Controllers\Api\HomeController::class, 'checkAPI'])
    ->get('/api/show', [App\Controllers\Api\HomeController::class, 'show'])
    ->post('/api/store', [App\Controllers\Api\HomeController::class, 'store'])
    ->put('/api/update',[App\Controllers\Api\HomeController::class, 'update'])
    ->post('/api/delete',[App\Controllers\Api\HomeController::class, 'delete']);



(new App\App($router, $routerAPI,
    [
        'uri' => $_SERVER['REQUEST_URI'],
        'method' => $_SERVER['REQUEST_METHOD'],
    ],
    new Config($_ENV)

))->run();

