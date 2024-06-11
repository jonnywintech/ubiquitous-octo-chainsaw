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
         echo "
        <form action='/invoices/create' method='post'>
        <input type='text' name='name'>
        </form>
        ";

        return 'Create Invoice';
    }

    public function store()
    {
        echo "<pre>";
        var_dump($_REQUEST);
        echo "</pre>";
    }

    public function delete (): string
    {
         echo "
        <form action='/invoices/destroy' method='post'>
        ". 
        form_method('delete') . "
        <input type='text' name='name'>
        </form>
        ";

        return 'delete Invoice';
    }

    public function destroy()
    {
        echo "<pre>";
        var_dump($_REQUEST);
        var_dump($_SERVER);
        echo "</pre>";
    }
}