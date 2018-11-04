<?php

namespace App\Components\Weather;

use App\Components\Weather\Contracts\Weater;
use App\Components\Weather\Service\DarkSky;
use Illuminate\Support\ServiceProvider;

class DarkskyProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Weater::class, DarkSky::class);
    }
}
