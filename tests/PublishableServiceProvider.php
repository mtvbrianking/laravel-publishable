<?php

namespace Bmatovu\Publishable\Tests;

use Illuminate\Support\ServiceProvider;

class PublishableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // ...
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(PublishableEventServiceProvider::class);
    }
}
