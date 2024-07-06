<?php 

declare(strict_types=1);

use App\Core\Router\Router;
use App\Middleware\AuthMiddleware;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Middleware\GuestMiddleware;
use App\Controllers\InvoiceController;

$router = new Router();


$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [AuthController::class, 'index'])->middleware(GuestMiddleware::class);
$router->post('/login', [AuthController::class, 'login'])->middleware(GuestMiddleware::class);
$router->get('/register', [AuthController::class, 'create'])->middleware(GuestMiddleware::class);
$router->post('/register', [AuthController::class, 'store'])->middleware(GuestMiddleware::class);
$router->get('/invoices', [InvoiceController::class, 'index']);
$router->get('/invoices/create', [InvoiceController::class, 'create']);
$router->post('/invoices/create', [InvoiceController::class, 'store']);
$router->get('/invoices/delete', [InvoiceController::class, 'delete']);
$router->delete('/invoices/destroy', [InvoiceController::class, 'destroy']);

echo $router->resolve($_POST['_method'] ?? strtolower($_SERVER['REQUEST_METHOD']), $_SERVER['REQUEST_URI']);
