<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;


// We can think of this file as a file for configuring our application:
// Disabling the lazy loading.
// We can do this in boot method, the boot method is triggered after all of the project dependencies have been fully loaded
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // On doing this, when we try to lazy load, we get error and hence we need to eager load our data then
        Model::preventLazyLoading();
    }
}
