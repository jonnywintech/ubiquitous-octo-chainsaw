<?php 

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Core\Router\Router;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Middleware\AuthMiddleware;

$router = new Router();


$router->get('/', [HomeController::class, 'index'])->middleware(AuthMiddleware::class);
$router->get('/login', [AuthController::class, 'index']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/invoices', [InvoiceController::class, 'index']);
$router->get('/invoices/create', [InvoiceController::class, 'create']);
$router->post('/invoices/create', [InvoiceController::class, 'store']);
$router->get('/invoices/delete', [InvoiceController::class, 'delete']);
$router->delete('/invoices/destroy', [InvoiceController::class, 'destroy']);

echo $router->resolve($_POST['_method'] ?? strtolower($_SERVER['REQUEST_METHOD']), $_SERVER['REQUEST_URI']);
