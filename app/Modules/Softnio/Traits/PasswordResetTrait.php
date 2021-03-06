<?php

namespace App\Modules\Softnio\Traits;

use App\Modules\Softnio\Models\User;
use Illuminate\Support\Facades\DB;

trait PasswordResetTrait
{
    public function tokenAndUser($email, $token = null)
    {
        $user = User::where('email', $email)
            ->first();

        $reset = null;

        if ($token) {
            $reset = DB::table('password_resets')
                ->where('token', $token)
                ->where('email', $email)
                ->first();
        }

        return ['user' => $user, 'token' => $reset];

    }
}
