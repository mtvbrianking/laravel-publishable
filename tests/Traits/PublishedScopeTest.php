<?php

namespace Bmatovu\Publishable\Tests;

use Bmatovu\Publishable\Tests\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublishedScopeTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_only_published_models()
    {
        factory(Post::class, 1)->create([
            'published_at' => null,
        ]);

        $published = Post::get();

        $this->assertEquals(0, $published->count());

        $published = Post::onlyPublished()->get();

        $this->assertEquals(0, $published->count());

        factory(Post::class, 2)->create([
            'published_at' => date('Y-m-d H:i:s'),
        ]);

        $published = Post::get();

        $this->assertEquals(2, $published->count());

        $drafts = Post::onlyDrafts()->get();

        $this->assertEquals(1, $drafts->count());

        $posts = Post::withDrafts()->get();

        $this->assertEquals(3, $posts->count());
    }
}
