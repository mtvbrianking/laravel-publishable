<?php

namespace Bmatovu\Publishable\Tests\Events;

use Bmatovu\Publishable\Tests\Models\Post;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostPublishedEvent
{
    use Dispatchable, SerializesModels;

    /**
     * Post.
     *
     * @var \Bmatovu\Publishable\Tests\Models\Post
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @param \Bmatovu\Publishable\Tests\Models\Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
