<?php

namespace Bmatovu\Publishable;

/**
 * @method static static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder withDrafts()
 * @method static static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder onlyDrafts()
 * @method static static|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder onlyPublished()
 */
trait Publishable
{
    /**
     * Boot the has-drafts trait for a model.
     *
     * @return void
     */
    public static function bootPublishable()
    {
        static::addGlobalScope(new PublishedScope);
    }

    /**
     * Initialize this trait for an instance.
     *
     * @return void
     */
    public function initializePublishable()
    {
        $this->dates[] = $this->getPublishedAtColumn();
    }

    /**
     * Save instance of this model as published.
     *
     * @param array $options
     *
     * @return bool
     */
    public function publish(array $options = [])
    {
        // https://laravel-news.com/laravel-model-events-getting-started
        // https://gist.github.com/scrubmx/7fc20663ce2b3ac103a2879915b572be
        // https://www.google.com/search?q=laravel+register+fire+model+event&oq=laravel+register+fire+model+event

        // If the "publishing" event returns false we bail out immediately and return false,
        // indicating that the save failed. This provides a chance for any
        // listeners to cancel save operations if validations fail or whatever.
        if ($this->fireModelEvent('publishing') === false) {
            return false;
        }

        $this->{$this->getPublishedAtColumn()} = $this->freshTimestamp();

        $saved = parent::save($options);

        if ($saved) {
            $this->fireModelEvent('published', false);
        }

        return $saved;
    }

    /**
     * Toogle model instance state to non-published.
     *
     * @param array $options
     *
     * @return bool
     */
    public function unpublish(array $options = [])
    {
        if ($this->fireModelEvent('unpublishing') === false) {
            return false;
        }

        $this->{$this->getPublishedAtColumn()} = null;

        $saved = parent::save($options);

        if ($saved) {
            $this->fireModelEvent('unpublished', false);
        }

        return $saved;
    }

    /**
     * Save instance of this model as a draft.
     *
     * @param array $options
     *
     * @return bool
     */
    public function draft(array $options = [])
    {
        return $this->unpublish($options);
    }

    /**
     * Register a "publishing" model event callback with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    public static function publishing($callback)
    {
        static::registerModelEvent('publishing', $callback);
    }

    /**
     * Register a "published" model event callback with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    public static function published($callback)
    {
        static::registerModelEvent('published', $callback);
    }

    /**
     * Register a "unpublishing" model event callback with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    public static function unpublishing($callback)
    {
        static::registerModelEvent('unpublishing', $callback);
    }

    /**
     * Register a "unpublished" model event callback with the dispatcher.
     *
     * @param \Closure|string $callback
     *
     * @return void
     */
    public static function unpublished($callback)
    {
        static::registerModelEvent('unpublished', $callback);
    }

    /**
     * Determine if the model instance is published.
     *
     * @return bool
     */
    public function isPublished()
    {
        return ! is_null($this->{$this->getPublishedAtColumn()});
    }

    /**
     * Get the name of the "published at" column.
     *
     * @return string
     */
    public function getPublishedAtColumn()
    {
        return defined('static::PUBLISHED_AT') ? static::PUBLISHED_AT : 'published_at';
    }

    /**
     * Get the fully qualified "published at" column.
     *
     * @return string
     */
    public function getQualifiedPublishedAtColumn()
    {
        return $this->qualifyColumn($this->getPublishedAtColumn());
    }
}
