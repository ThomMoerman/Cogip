<?php
declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/Core/Helper.php';

// Add all controllers here 
require_once __DIR__.'/Core/Controller.php';
require_once __DIR__.'/Controllers/HomeController.php';

use App\Controllers\HomeController;

$page = $_GET['page'] ?? null;

// Load the controller
// It will *control* the rest of the work to load the page
switch ($page) {
    case 'home':
    break;
    default:
        (new HomeController())->index();
        break;
    }