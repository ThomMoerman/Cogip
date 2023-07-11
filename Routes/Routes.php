<?php
namespace App\Routes;

use App\Controllers\CompanyController;
use App\Controllers\ContactController;
use App\Controllers\InvoiceController;
use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthentificationController;


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

// Route pour afficher le formulaire de connexion
$router->get('/login', function () {
    (new AuthentificationController($router))->showLoginForm();
});

// Route pour traiter la soumission du formulaire de connexion
$router->post('/login', function () {
    (new AuthentificationController($router))->login();
});

// Route pour afficher le formulaire d'inscription
$router->get('/register', function () {
    (new AuthentificationController($router))->showRegistrationForm();
});

// Route pour traiter la soumission du formulaire d'inscription
$router->post('/register', function () {
    (new AuthentificationController($router))->register();
});

$router->run();