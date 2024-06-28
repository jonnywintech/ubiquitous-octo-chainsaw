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
    public static function setStatusCode(int $status): void
    {
        http_response_code($status);
    }
}