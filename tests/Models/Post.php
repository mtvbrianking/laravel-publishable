<?php

namespace Bmatovu\Publishable\Tests\Models;

use Bmatovu\Publishable\Publishable;
use Bmatovu\Publishable\Tests\Events\PostPublishedEvent;
use Bmatovu\Publishable\Tests\Events\PostUnpublishedEvent;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Publishable;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'published_at',
    ];

    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'published' => PostPublishedEvent::class,
        'unpublished' => PostUnpublishedEvent::class,
    ];
}
