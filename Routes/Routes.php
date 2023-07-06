<?php
namespace App\Routes;

use App\Controllers\CompanyController;
use App\Controllers\ContactController;
use App\Controllers\InvoiceController;
use Bramus\Router\Router;
use App\Controllers\HomeController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$router = new Router();

$router->get('/', function () {
    (new HomeController)->index();
});

$router->get('/companies', function () {
    (new CompanyController)->index();
});

$router->get('/contacts', function () {
    (new ContactController)->index();
});

$router->get('/invoices', function () {
    (new InvoiceController)->index();
});

$router->get('/companies/{id}', function ($id) {
    (new CompanyController)->show($id);
});

$router->get('/invoices/{id}', function ($id) {
    (new InvoiceController)->show($id);
});

$router->get('/contacts/{id}', function ($id) {
    (new ContactController)->show($id);
});

$router->run();