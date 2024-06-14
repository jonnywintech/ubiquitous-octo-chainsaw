<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Middleware\Middleware;

class GuestMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  array  $request
     * @param  callable  $next
     */
    public function handle(array $request, callable $next)
    {
        return $next($request);
    }
}
