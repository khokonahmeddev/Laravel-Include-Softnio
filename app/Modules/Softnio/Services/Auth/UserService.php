<?php

namespace App\Modules\Softnio\Services\Auth;


use App\Modules\Softnio\Models\User;
use App\Modules\Softnio\Services\BaseService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function login(): User
    {
        $user = $this->model::query()->whereEmail(request()->get('email'))->first();

        if (Hash::check(request()->get('password'), optional($user)->password)) {

            auth()->login($user);

            return $user;
        }

        throw new AuthenticationException(
            'incorrect_user_password', [
            'password' => 'password',
            'email' => 'email'
        ]);
    }
}
