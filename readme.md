## Laravel Publishable.

[![Build Status](https://travis-ci.org/mtvbrianking/laravel-publishable.svg?branch=master)](https://travis-ci.org/mtvbrianking/laravel-publishable)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mtvbrianking/laravel-publishable/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/laravel-publishable/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mtvbrianking/laravel-publishable/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/laravel-publishable/?branch=master)
[![StyleCI](https://github.styleci.io/repos/274241950/shield?branch=master)](https://github.styleci.io/repos/274241950)
[![Documentation](https://img.shields.io/badge/Documentation-Blue)](https://mtvbrianking.github.io/laravel-publishable)

This package contains a trait to make Eloquent models publishable. It enables the model to hold a published vs non-published state, which comes in handy for things like blog posts that can be drafts or final (published) posts.

It uses a `published_at` attribute to determine the model state ie, if the model published_at is null, the model isn't published.

### [Installation](https://packagist.org/packages/bmatovu/laravel-publishable)

Install via Composer package manager:

```
composer require bmatovu/laravel-publishable
```

### Usage

Add the `publsihed_at` column to your database table. 

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // ...
            $table->timestamp('published_at')->nullable();
        });
    }
}
```

To make a model publishable, use the `Bmatovu\Publishable\Publishable` trait on the model:

```php
<?php

namespace App\Models;

use Bmatovu\Publishable\Publishable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Publishable;
}
```

> {tip} The `Publishable` trait will automatically cast the `published_at` attribute to a `DateTime` / `Carbon` instance for you.

Now, when you call the `publish` method on the model, the `published_at` column will be set to the current date and time. 

### Querying Publishable Models

When querying a model that is publishable, the unpublished models will automatically be excluded from all query results.

```php
$publishedPosts = Post::get();

$publishedPosts = Post::onlyPublished()->get();
```

However, you may force unpublished models to appear in a result set using the `withDrafts` method on the query:

```php
$posts = Posts::withDrafts()->get();
```

You may also retrieve **only** unpublished models using the `onlyDrafts` method.

```php
$drafts = Posts::onlyDrafts()->get();
```

To determine if a given model instance has been published, use the `isPublished` method:

```php
if ($post->isPublished()) {
    // ...
}
```

### Publishing Models

You can save a model as published in your database like;

```php
// Publishing a single model instance...
$post->publish();

// Publishing all related models...
$post->inLifeStyle()->publish();
```

### Unpublishing Models

You can "un-published" a published model like;

```php
$post->unpublish();
```
