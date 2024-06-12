<?php

declare(strict_types=1);

namespace App\Middleware;

abstract class Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  array  $request
     * @param  callable  $next
     */
    abstract public function handle(array $request, callable $next);
}