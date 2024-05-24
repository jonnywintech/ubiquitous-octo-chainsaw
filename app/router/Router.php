<?php

namespace App\Router;

use App\Exceptions\RouteNotFoundException;

class Router {

    private array $routes = array();

    public function register(string $route, callable $action): self
    {
        $this->routes[$route] = $action;

        return $this;
    }

    public function resolve(string $requestUri)
    {
        $route = explode('?', $requestUri)[0];
        $action= $this->routes[$route] ?? null;

        if (! $action) {
            throw new RouteNotFoundException('Route not found');
        }

        return call_user_func($action);
    }
}