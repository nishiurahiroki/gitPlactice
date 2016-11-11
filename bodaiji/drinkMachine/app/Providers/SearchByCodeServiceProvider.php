<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SearchByCode;

class SearchByCodeServiceProvider extends ServiceProvider
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
        $this->app->bind('searchByCode', function() {
        	return new SearchByCode;
        });
    }
}
