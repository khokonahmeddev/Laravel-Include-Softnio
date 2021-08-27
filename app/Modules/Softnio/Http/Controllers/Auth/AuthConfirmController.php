<?php

namespace App\Modules\Softnio\Http\Controllers\Auth;

class AuthConfirmController
{
    public function confirm()
    {
        return view('App\Modules\Softnio::auth.confirm');
    }
}
