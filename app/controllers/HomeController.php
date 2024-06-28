<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View\View;

class HomeController {

    public function index (): string
    {
       return View::render('pages.home.index');
    }

}