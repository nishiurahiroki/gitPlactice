<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\itemSearch;

class ItemSearchServiceProvider extends ServiceProvider
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
    public function register() {
    	$this->app->bind('itemSearch', function() {
    		return new ItemSearch;
    	});
    }
}
