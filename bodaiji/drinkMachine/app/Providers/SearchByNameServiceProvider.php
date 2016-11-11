<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\SearchByName;

class SearchByNameServiceProvider extends ServiceProvider
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
      $this->app->bind('searchByName', function() {
        return new SearchByName;
      });
    }
}
