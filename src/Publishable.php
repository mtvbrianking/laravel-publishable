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
     * Initialize the has-drafts trait for an instance.
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
        return $this->draft($options);
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
        $this->{$this->getPublishedAtColumn()} = null;

        $saved = parent::save($options);

        if ($saved) {
            $this->fireModelEvent('unpublished', false);
        }

        return $saved;
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
