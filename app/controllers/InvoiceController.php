<?php

declare(strict_types=1);

namespace App\Controllers;

class InvoiceController {

    public function index (): string
    {
        return 'Invoice';
    }

    public function create (): string
    {
        return 'Create Invoice';
    }
}