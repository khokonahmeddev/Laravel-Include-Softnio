<?php

use App\Modules\Softnio\Http\Controllers\Auth\AuthConfirmController;
use App\Modules\Softnio\Http\Controllers\Auth\LoginController;
use App\Modules\Softnio\Http\Controllers\Auth\PasswordResetController;
use App\Modules\Softnio\Http\Controllers\Auth\RegisterController;
use App\Modules\Softnio\Http\Controllers\Auth\User\ProfileController;
use App\Modules\Softnio\Http\Controllers\Auth\VerifyUserController;
use App\Modules\Softnio\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//auth()->loginUsingId(1);
Route::get('/', function () {
    return redirect()->route('show.login');
});

Route::get('login', [LoginController::class, 'loginShow'])
    ->name('show.login');
Route::post('login', [LoginController::class, 'login'])
    ->name('login');
Route::get('logout', [LoginController::class, 'logout'])
    ->name('logout');


Route::get('register', [RegisterController::class, 'registerShow'])
    ->name('show.register');

Route::post('register', [RegisterController::class, 'create'])
    ->name('register.request');

Route::get('auth-reset', [PasswordResetController::class, 'resetShow'])
    ->name('reset.show');

Route::post('password-reset', [PasswordResetController::class, 'reset'])
    ->name('password_reset.request');

Route::get('auth-confirm', [AuthConfirmController::class, 'confirm'])
    ->name('auth.confirm');

Route::get('verify-user', [VerifyUserController::class, 'verify'])
    ->name('user.verify');

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [HomeController::class, 'index'])
        ->name('home');

    Route::get('kyc', [ProfileController::class, 'kycView'])
        ->name('kyc.view');


    Route::get('auth/profile', [ProfileController::class, 'profile'])->name('profile');

    Route::post('auth/profile-update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('profile', [ProfileController::class, 'showProfile'])->name('profile.show');
});

