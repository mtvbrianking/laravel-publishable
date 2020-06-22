## Laravel Publishable.

[![Build Status](https://travis-ci.org/mtvbrianking/laravel-publishable.svg?branch=master)](https://travis-ci.org/mtvbrianking/laravel-publishable)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mtvbrianking/laravel-publishable/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/laravel-publishable/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mtvbrianking/laravel-publishable/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/laravel-publishable/?branch=master)
[![StyleCI](https://github.styleci.io/repos/230607368/shield?branch=master)](https://github.styleci.io/repos/230607368)
[![Documentation](https://img.shields.io/badge/Documentation-Blue)](https://mtvbrianking.github.io/laravel-publishable)

This package contains a trait to make Eloquent models publishable. It enables the model to hold a published vs non-published state, which comes in handy for things like blog posts that can be drafts or final (published) posts.

It uses a `published_at` attribute to determine the model state ie, if the model published_at is null, the model isn't published.


### [Installation](https://packagist.org/packages/bmatovu/laravel-publishable)

Install via Composer package manager:

```
composer require bmatovu/laravel-publishable
```

### Usage

You should also add the `publsihed_at` column to your database table. 

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

To enable soft deletes for a model, use the `Illuminate\Database\Eloquent\SoftDeletes` trait on the model:

```php
<?php

namespace App;

use Bmatovu\Publishable\Publishable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Publishable;
}
```

> {tip} The `Publishable` trait will automatically cast the `published_at` attribute to a `DateTime` / `Carbon` instance for you.

Now, when you call the `publish` method on the model, the `published_at` column will be set to the current date and time. And, when querying a model that is publishable, the unpublished models will automatically be excluded from all query results.

To determine if a given model instance has been published, use the `isPublished` method:

```php
if ($post->isPublished()) {
    //
}
```

### Querying Publishable Models

Unpublished models are automatically be excluded from query results.

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

### Publishing Models

Sometimes you may need to save a model as published in your database. For this, use the `publish` method:

```php
// Publishing a single model instance...
$post->publish();

// Publishing all related models...
$post->inLifeStyle()->publish();
```

### Unpublishing Models

Sometimes you may wish to "un-published" a published model. To toogle a published model into an inactive state, use the `unpublish` method on a model instance:

```php
$post->unpublish();
```
