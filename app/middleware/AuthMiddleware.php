<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Middleware\Middleware;

class AuthMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  array  $request
     * @param  callable  $next
     */
    public function handle(array $request, callable $next)
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        return $next($request);
    }
}
