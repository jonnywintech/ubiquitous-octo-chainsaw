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
        $test->select('first_name')->where('last_name', 'Stankovic')->where('first_name', 'Nikola' , '!=')->get()->first();
        // dd($test->toSql());
        dd($test);
       return View::render('pages.home.index');
    }

}