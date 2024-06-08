<?php 

declare(strict_types=1);

use App\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;



$router = new Router();


$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create'])
    ->post('/invoices/create', [InvoiceController::class, 'store'])
    ->get('/invoices/delete', [InvoiceController::class, 'delete'])
    ->delete('/invoices/destroy', [InvoiceController::class, 'destroy']);


echo $router->resolve($_POST['_method'] ?? strtolower($_SERVER['REQUEST_METHOD']), $_SERVER['REQUEST_URI']);

// dd($router->routes());