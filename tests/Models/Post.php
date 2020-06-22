<?php

namespace Bmatovu\Publishable\tests\Models;

use Bmatovu\Publishable\Publishable;
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
}
