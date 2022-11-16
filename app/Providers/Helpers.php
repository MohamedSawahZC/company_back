<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\Helper;
class Helpers extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('helper',function(){
            return new Helper();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}