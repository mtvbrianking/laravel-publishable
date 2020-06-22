<?php

namespace Bmatovu\Publishable\Tests;

use Bmatovu\Publishable\Tests\Events\PostPublished;
use Bmatovu\Publishable\Tests\Events\PostUnpublished;
use Bmatovu\Publishable\Tests\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

class PublishableTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_can_determine_published_state()
    {
        Event::fake();

        $post = factory(Post::class)->create();

        $this->assertFalse($post->isPublished());

        $post->publish();

        $this->assertTrue($post->isPublished());

        Event::assertDispatched(PostPublished::class);

        $post->unpublish();

        $this->assertFalse($post->isPublished());

        Event::assertDispatched(PostUnpublished::class);
    }
}
