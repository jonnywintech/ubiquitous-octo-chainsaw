<?php

declare(strict_types=1);

namespace App\Controllers;

class AuthController
{

    public function index()
    {
        return " 
        <form action='/login' method='POST'>
        <input type='text' name='username' id='' placeholder='username'>
        <input type='password' name='password' id='' placeholder='************'>
        
        <button>login</button>
        </form>";
    }

    public function login(){
        
        dump($_REQUEST);
        
    }
}
