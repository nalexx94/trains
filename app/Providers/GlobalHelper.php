<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\GlobalHelper as GlHelper;

class GlobalHelper extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GLHelper',function ($app) {
            return new GlHelper();
        });
    }
}
