<?php

namespace Bmatovu\Publishable;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PublishedScope implements Scope
{
    /**
     * All of the extensions to be added to the builder.
     *
     * @var array
     */
    protected $extensions = ['WithDrafts', 'OnlyDrafts', 'onlyPublished'];

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model   $model
     *
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->whereNotNull($model->getQualifiedPublishedAtColumn());
    }

    /**
     * Extend the query builder with the needed functions.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     *
     * @return void
     */
    public function extend(Builder $builder)
    {
        foreach ($this->extensions as $extension) {
            $this->{"add{$extension}"}($builder);
        }
    }

    /**
     * Add the with-drafts extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     *
     * @return void
     */
    protected function addWithDrafts(Builder $builder)
    {
        $builder->macro('withDrafts', function (Builder $builder) {
            return $builder->withoutGlobalScope($this);
        });
    }

    /**
     * Add the only-published extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     *
     * @return void
     */
    protected function addOnlyPublished(Builder $builder)
    {
        $builder->macro('onlyPublished', function (Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this)->whereNotNull(
                $model->getQualifiedPublishedAtColumn()
            );

            return $builder;
        });
    }

    /**
     * Add the only-drafts extension to the builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     *
     * @return void
     */
    protected function addOnlyDrafts(Builder $builder)
    {
        $builder->macro('onlyDrafts', function (Builder $builder) {
            $model = $builder->getModel();

            $builder->withoutGlobalScope($this)->whereNull(
                $model->getQualifiedPublishedAtColumn()
            );

            return $builder;
        });
    }
}
