<?php

use App\Router\Router;

require './vendor/autoload.php';

$router = new Router();


$router->register('/', function (){
    echo 'HOME';
});

$router->register('/about', function (){
    echo 'ABOUT';
});


echo $router->resolve($_SERVER['REQUEST_URI']);