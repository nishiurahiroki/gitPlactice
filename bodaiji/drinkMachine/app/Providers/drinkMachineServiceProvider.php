<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\InsertItem;

class drinkMachineServiceProvider extends ServiceProvider
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
       $this->app->bind('insertItem', function() {
       		return new InsertItem;
       });
    }
}
