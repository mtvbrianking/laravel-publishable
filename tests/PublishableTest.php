<?php

namespace Bmatovu\Publishable\Tests;

use Bmatovu\Publishable\Tests\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Mockery as m;

class PublishableTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        m::close();
    }

    public function testPublishCancel()
    {
        $model = m::mock(Post::class)->shouldAllowMockingProtectedMethods();
        $model->makePartial();
        $model->shouldReceive('fireModelEvent')->with('publishing')->andReturn(false);
        $model->shouldReceive('published')->never();

        $this->assertFalse($model->publish());
    }

    public function testUnpublishCancel()
    {
        $model = m::mock(Post::class)->shouldAllowMockingProtectedMethods();
        $model->makePartial();
        $model->shouldReceive('fireModelEvent')->with('unpublishing')->andReturn(false);
        $model->shouldReceive('unpublished')->never();

        $this->assertFalse($model->unpublish());
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

    public function test_can_determine_published_state()
    {
        Event::fake();

        $post = factory(Post::class)->create();

        $this->assertFalse($post->isPublished());

        $post->publish();

        $this->assertTrue($post->isPublished());

        Event::assertDispatched('eloquent.publishing: '.Post::class, function ($event, $resource) use ($post) {
            return $resource->id === $post->id;
        });

        Event::assertDispatched('eloquent.published: '.Post::class, function ($event, $resource) use ($post) {
            return $resource->id === $post->id;
        });

        $post->draft();
        // $post->unpublish();

        $this->assertFalse($post->isPublished());

        Event::assertDispatched('eloquent.unpublishing: '.Post::class, function ($event, $resource) use ($post) {
            return $resource->id === $post->id;
        });

        Event::assertDispatched('eloquent.unpublished: '.Post::class, function ($event, $resource) use ($post) {
            return $resource->id === $post->id;
        });
    }
}
