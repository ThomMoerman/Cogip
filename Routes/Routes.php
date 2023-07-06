<?php
namespace App\Routes;

use App\Controllers\CompanyController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Bramus\Router\Router;
use App\Controllers\HomeController;

$router = new Router();
// $routerCompany = new Router();

$router->get('/', function () {
    (new HomeController)->index();
});

$router->get('/companies', function () {
    (new CompanyController)->index();
});

$router->get('/contacts', function(){
    (new ContactController)->index();
});

$router->get('/invoices', function (){
    (new InvoicesController)->index();
});

$router->run();
// $routerCompany->run();