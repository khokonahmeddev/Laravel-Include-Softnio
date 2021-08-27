<?php

namespace App\Modules\Softnio\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return view('App\Modules\Softnio::admin.home.home');
    }
}
