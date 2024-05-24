<?php

use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Router\Router;

require './vendor/autoload.php';

$router = new Router();


$router
->register('/', [HomeController::class, 'index'])
->register('/invoices',[ InvoiceController::class, 'index'])
->register('/invoices/create',[ InvoiceController::class, 'create']);


echo $router->resolve($_SERVER['REQUEST_URI']);