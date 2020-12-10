<?php

namespace Bmatovu\Publishable\Tests\Models;

use Bmatovu\Publishable\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

    protected static function boot()
    {
        parent::boot();

        static::publishing(function ($post) {
            Log::info("Publishing post {$post->id}.");
        });

        static::published(function ($post) {
            Log::info("Published post {$post->id}.");
        });

        static::unpublishing(function ($post) {
            Log::info("Unpublishing post {$post->id}.");
        });

        static::unpublished(function ($post) {
            Log::info("Unpublished post {$post->id}.");
        });
    }
}
