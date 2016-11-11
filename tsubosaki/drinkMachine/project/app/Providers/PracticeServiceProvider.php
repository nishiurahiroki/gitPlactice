<?php

namespace App\Providers;

use App;

use Illuminate\Support\ServiceProvider;

class PracticeServiceProvider extends ServiceProvider
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
        //
        App::bind('practiceDao', function() {
        	return new \App\Dao\PracticeDao;
        });
    }
}
