<?php

declare(strict_types=1);

namespace App\Core\Middleware;

abstract class Middleware
{
    /**
     * Handle an incoming request.
     */
    abstract public function handle();
}