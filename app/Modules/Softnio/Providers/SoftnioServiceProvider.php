<?php

namespace App\Modules\Softnio\Providers;

use Carbon\Laravel\ServiceProvider;

class SoftnioServiceProvider extends ServiceProvider
{
    public function register()
    {
//        $this->mergeConfigFrom(
//            __DIR__.'/../config/auth.php', 'auth'
//        );
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'App\Modules\Softnio');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
