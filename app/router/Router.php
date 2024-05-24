<?php

declare(strict_types=1);

namespace App\Router;

use App\Exceptions\RouteNotFoundException;

class Router
{

    private array $routes = array();

    public function register(string $route, callable|array $action): self
    {
        $this->routes[$route] = $action;

        return $this;
    }

    public function resolve(string $requestUri)
    {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException('Route not found');
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            
            if(class_exists($class)) {
                $class = new $class();
            }

            if(method_exists($class, $method)) {
                return call_user_func_array([$class, $method],[]);
            }
        }

        throw new RouteNotFoundException('Route not found');

    }
}
