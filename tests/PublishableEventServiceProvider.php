<?php

namespace Bmatovu\Publishable\Tests;

use Bmatovu\Publishable\Tests\Events\PostPublishedEvent;
use Bmatovu\Publishable\Tests\Listeners\PostPublishedListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class PublishableEventServiceProvider extends EventServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        PostPublishedEvent::class => [
            PostPublishedListener::class,
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // ...
    }
}
