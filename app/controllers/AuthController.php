<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View\View;

class AuthController
{

    public function index()
    {
       return View::render('Auth.Login.index');
    }

    public function login(){
        
        dump($_REQUEST);
        
    }
}
