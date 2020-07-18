<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\PostRequest;


class DoPostRequestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('App\Lib\PostRequest', function ($app) {
            return new PostRequest();
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
