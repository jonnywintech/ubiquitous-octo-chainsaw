<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View\View;

class HomeController {

    public function index (): string
    {
        dd(getenv('DB_HOST'), $_ENV);
       return View::render('pages.home.index');
    }

}