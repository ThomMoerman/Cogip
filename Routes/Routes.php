<?php
namespace App\Routes;

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

use Bramus\Router\Router;
use App\Controllers\HomeController;

$router = new Router();

$router->get('/', function() {
    (new HomeController)->index();
});

$router->run();