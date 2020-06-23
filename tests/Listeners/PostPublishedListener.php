<?php

namespace Bmatovu\Publishable\Tests\Listeners;

use Bmatovu\Publishable\Tests\Events\PostPublishedEvent;

/**
 * @see https://laracasts.com/discuss/channels/testing/best-way-to-test-event-listeners?reply=86060
 */
class PostPublishedListener
{
    /**
     * Handle the event.
     *
     * @param \Bmatovu\Publishable\Tests\Events\PostPublishedEvent $event
     *
     * @return mixed
     */
    public function handle(PostPublishedEvent $event)
    {
        // app('log')->info($event->post);
    }
}
