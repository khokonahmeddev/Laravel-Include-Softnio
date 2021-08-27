<?php

namespace App\Modules\Softnio\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Softnio\Http\Requests\Register\RegisterRequest as Request;
use App\Modules\Softnio\Mail\User\UserRegisterMail;
use App\Modules\Softnio\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerShow()
    {
        return view('App\Modules\Softnio::auth.register');
    }


    protected function create(Request $request)
    {
        $invitation_token = base64_encode($request->get('email') . '-invitation-from-token');
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'invitation_token' => $invitation_token,
            'terms' => $request->terms
        ]);

        Mail::to($user->email)->send(new UserRegisterMail($user));
        return response()->json([
            'message' => 'User created successfully'
        ], 200);

    }
}
