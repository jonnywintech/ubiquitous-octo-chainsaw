<?php

declare(strict_types=1);

namespace App\Core\Http;

class Response
{
    /**
     * Method setStatusCode
     *
     * @param int $status set response status code
     *
     * @return void
     */
    public static function setStatusCode(int $status = 200): void
    {
        http_response_code($status);
    }

    public static function redirect(string $url): void
    {
        header("Location: {$url}");
    }
}
