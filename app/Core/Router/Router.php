<?php

declare(strict_types=1);

namespace App\Core\Router;

use App\Core\Http\Request;
use Exception;
use App\Core\View\View;
use App\Exceptions\RouteNotFoundException;
use App\Core\Http\Response;

class Router
{

    private array $routes = array();
    private Request $request;
    private Response $response;


    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
    }

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route]['action'] = $action;
        $this->routes[$requestMethod][$route]['middlewares'] = [];
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }
    public function put(string $route, callable|array $action): self
    {
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
        return $this->register($method, $route, $action);
    }
    public function patch(string $route, callable|array $action): self
    {
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

        return $this->register($method, $route, $action);
    }
    public function delete(string $route, callable|array $action): self
    {
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

        return $this->register($method, $route, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function middleware($key)
    {
        $route = &$this->routes[array_key_last($this->routes)];
        $url_key = array_key_last($route);
        $middlewares = $route[$url_key]['middlewares'][] = $key;
        // dd($this->routes);
    }

    public function resolve(string $requestMethod, string $requestUri)
    {
        // var_dump($requestMethod);
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route]['action'] ?? null;
        $middlewares =  $this->routes[$requestMethod][$route]['middlewares'] ?? null;

        if (!$action) {
            Response::setStatusCode(404);
            return View::render('errors._404');
        }


        if ($middlewares !== []) {
            foreach ($middlewares as $middleware) {
                if (!class_exists($middleware)) {
                    throw new Exception('middleware class not found');
                }

                $class = new $middleware();
                $class->handle();
            }
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = new $class();
            }

            if (method_exists($class, $method)) {
                return call_user_func_array([$class, $method],[$this->request, $this->response]);
            }
        }

        throw new RouteNotFoundException();
    }
}
