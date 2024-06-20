<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Core\Middleware\Middleware;

class GuestMiddleware extends Middleware
{
    /**
     * Handle an incoming request.

     */
    public function handle()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit;
        }
    }
}
