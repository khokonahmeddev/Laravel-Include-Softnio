<?php

namespace App\Modules\Softnio\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Softnio\Mail\User\PasswordResetMail;
use App\Modules\Softnio\Traits\PasswordResetTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class PasswordResetController extends Controller
{
    use PasswordResetTrait;

    public function resetShow()
    {
        return view('App\Modules\Softnio::auth.reset_password');
    }

    public function reset(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], ['email.exists' => 'No user found on that email']);

        ['user' => $user] = $this->tokenAndUser($request->get('email'));

        $token = base64_encode(microtime(true));

        DB::table('password_resets')->insert([
            'email' => $request->get('email'),
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($user->email)
            ->send(new PasswordResetMail($user));

        return response()->json([
            'status' => true,
            'message' => 'Hi we have sent an email containing a password reset link to your email address please check it and confirm']);

    }
}
