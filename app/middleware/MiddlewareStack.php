<?php

use App\Middleware\Middleware;
use App\Router\Router;

class MiddlewareStack
{
    protected $start;

    public function __construct()
    {
        $this->start = function () {
            //
        };
    }

    public function add(Middleware $middleware)
    {
        $next = $this->start;

        $this->start = function () use ($middleware, $next) {
            return $middleware($next);
        };
    }

    public function handle(Router $request)
    {

        return call_user_func($this->start, $request);
    }
}
