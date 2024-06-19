<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Middleware\Middleware;

class AuthMiddleware extends Middleware
{
    /**
     * Handle an incoming request.

     */
    public function handle()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }
}
