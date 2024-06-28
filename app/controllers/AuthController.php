<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View\View;

class AuthController
{

    public function index()
    {
        return View::render('auth.login.index');
    }

    public function create()
    {
        return View::render('auth.login.create');
    }

    public function login()
    {

        session_start();

        if (isset($_COOKIE['user'])){
            dd('user_exist', $_COOKIE['user']);
        }

        $generated_hash = openssl_random_pseudo_bytes(128);

        setcookie('user', $generated_hash, time()+(60*60));
        // dd($_REQUEST);
    }

    public function logout()
    {
        session_unset();
        

        header('Location: /login');
        die();
    }
}
