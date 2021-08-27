<?php

namespace App\Modules\Softnio\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Softnio\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Carbon;

class VerifyUserController extends Controller
{
    public function verify()
    {
        $token = str_replace('}', '', request()->invitation_token);

        try {
            $user = User::where('invitation_token', $token)->firstOrFail();

            $user->fill(['email_verified_at' => Carbon::now()])->save();

            auth()->loginUsingId($user->id);

            return redirect()->route('home');

        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'Invalid token'], 400);
        }

    }
}
