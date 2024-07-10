<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Http\Request;
use App\Core\View\View;
use App\Models\Test;

class HomeController {

    public function index (Request $request): string
    {        
        $test= new Test();
        $data = $test->all();
        $data = [1,2,3,4];

       return View::render('pages.home.index', ['data' => $data]);
    }

}