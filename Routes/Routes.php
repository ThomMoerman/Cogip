<?php
namespace App\Routes;

use App\Controllers\CompanyController;
use App\Controllers\ContactController;
use App\Controllers\InvoiceController;
use App\Models\Contact;
use Bramus\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Core\Controller;

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

$router->get('/login', function () {
    (new AuthController)->showLoginForm();
});

$router->post('/login', function () {
    (new AuthController)->login();
});

$router->get('/logout', function () {
    (new AuthController)->logout();
});

$router->get('/dashboard', function () {
    (new DashboardController)->index();
});

$router->get('/companies_add', function () {
    (new CompanyController)->showCompanyForm();
});

$router->post('/companies_add', function () {
    (new CompanyController)->add();
});

$router->get('/invoices_add', function () {
    (new InvoiceController)->showInvoiceForm();
});

$router->post('/invoices_add', function () {
    (new InvoiceController)->add();
});

$router->get('/contacts_add', function () {
    (new ContactController)->showContactForm();
});

$router->post('/contacts_add', function () {
    (new ContactController)->add();
});

$router->get('/edit-invoice/{id}', function () {
    (new DashboardController)->editInvoiceIndex();
});

$router->post('/edit-invoice/{id}', function ($id) {
    (new InvoiceController)->update($id);
});

$router->get('/edit-company/{id}', function () {
    (new DashboardController)->editCompanyIndex();
});

$router->post('/edit-company/{id}', function ($id) {
    (new CompanyController)->update($id);
});

$router->get('/edit-contact/{id}', function () {
    (new DashboardController)->editContactIndex();
});

$router->post('/edit-contact/{id}', function ($id) {
    (new ContactController)->update($id);
});

$router->post('/contacts/{id}', function ($id) {
    (new ContactController)->delete($id);
});

$router->get('/register', function () {
    (new AuthController)->showRegisterForm();
});

$router->post('/register', function () {
    (new AuthController)->register();
});
$router->get('/delete-contact/{id}', function ($id) {
    (new DashboardController)->deleteContactIndex();
    (new ContactController)->delete($id);
});
$router->get('/delete-company/{id}', function ($id) {
    (new DashboardController)->deleteCompanyIndex();
    (new CompanyController)->delete($id);
});
$router->get('/delete-invoice/{id}', function ($id) {
    (new DashboardController)->deleteInvoiceIndex();
    (new InvoiceController)->delete($id);
});

$router->run();