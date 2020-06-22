<?php

namespace Bmatovu\Publishable\Tests;

use Bmatovu\Publishable\Tests\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublishableTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_publish()
    {
        $post = new Post;
        $post->publish();

        $this->assertNotNull($post->published_at);
    }

    public function test_can_set_explicit_publish_field()
    {
        $post = factory(Post::class)->create([
            'published_at' => date('Y-m-d H:i:s'),
        ]);

        $this->assertNotNull($post->published_at);

        $post = factory(Post::class)->create([
            'published_at' => null,
        ]);

        $this->assertNull($post->published_at);
    }
}
