<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Update;

class UpdateServiceProvider extends ServiceProvider
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
        $this->app->bind('update', function() {
        	return new Update;
        });
    }
}
