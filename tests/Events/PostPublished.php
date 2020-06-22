<?php

namespace Bmatovu\Publishable\Tests\Events;

use Bmatovu\Publishable\Tests\Models\Post;
use Illuminate\Queue\SerializesModels;

class PostPublished
{
    use SerializesModels;

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
