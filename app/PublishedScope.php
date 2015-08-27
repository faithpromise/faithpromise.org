<?php

// http://softonsofa.com/laravel-5-eloquent-global-scope-how-to/

namespace App;

use Illuminate\Database\Query\Builder as BaseBuilder;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ScopeInterface;
use Carbon\Carbon;

class PublishedScope implements ScopeInterface {

    /**
     * Apply scope on the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $builder
     * @param \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $column = $model->getQualifiedPublishedColumn();

        $builder->where(function($query) use ($column) {
            $query->whereNull($column)->orWhere($column, '<', Carbon::now());
        });

        $this->addWithDrafts($builder);
    }

    /**
     * Remove scope from the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $builder
     * @param \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function remove(Builder $builder, Model $model)
    {
        $query = $builder->getQuery();

        $column = $model->getQualifiedPublishedColumn();

        $bindingKey = 0;

        foreach ((array) $query->wheres as $key => $where)
        {
            if ($this->isPublishedConstraint($where, $column))
            {
                $this->removeWhere($query, $key);

                // Here SoftDeletingScope simply removes the where
                // but since we use Basic where (not Null type)
                // we need to get rid of the binding as well
                $this->removeBinding($query, $bindingKey);
            }

            // Check if where is either NULL or NOT NULL type,
            // if that's the case, don't increment the key
            // since there is no binding for these types
            if ( ! in_array($where['type'], ['Null', 'NotNull'])) $bindingKey++;
        }
    }

    /**
     * Remove scope constraint from the query.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @param  int  $key
     * @return void
     */
    protected function removeWhere(BaseBuilder $query, $key)
    {
        unset($query->wheres[$key]);

        $query->wheres = array_values($query->wheres);
    }

    /**
     * Remove scope constraint from the query.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @param  int  $key
     * @return void
     */
    protected function removeBinding(BaseBuilder $query, $key)
    {
        $bindings = $query->getRawBindings()['where'];

        unset($bindings[$key]);

        $query->setBindings(array_values($bindings));
    }

    /**
     * Check if given where is the scope constraint.
     *
     * @param  array   $where
     * @param  string  $column
     * @return boolean
     */
    protected function isPublishedConstraint(array $where, $column)
    {
        $test = ($where['type'] == 'Nested'
            && $where['query']->wheres[0]['type'] == 'Null'
            && $where['query']->wheres[0]['column'] == $column
            && $where['query']->wheres[1]['type'] == 'Basic'
            && $where['query']->wheres[1]['column'] == $column
            && $where['query']->wheres[1]['operator'] == '<'
            && $where['query']->wheres[1]['value'] instanceof Carbon);
        return $test;
    }

    /**
     * Extend Builder with custom method.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $builder
     */
    protected function addWithDrafts(Builder $builder)
    {
        $builder->macro('withDrafts', function(Builder $builder)
        {
            $this->remove($builder, $builder->getModel());

            return $builder;
        });
    }
}
