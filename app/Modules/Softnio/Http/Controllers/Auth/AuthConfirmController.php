<?php

namespace App\Modules\Softnio\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

class AuthConfirmController extends Controller
{
    public function confirm()
    {
        return view('App\Modules\Softnio::auth.confirm');
    }
}
