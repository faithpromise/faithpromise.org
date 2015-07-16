<?php

namespace App;

use Illuminate\Database\Query\Builder as BaseBuilder;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ScopeInterface;
use Carbon\Carbon;

class EventEndsScope implements ScopeInterface {

    /**
     * Apply scope on the query.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $builder
     * @param \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $column = $model->getQualifiedEventEndsColumn();

        $builder->where(function($query) use ($column) {
            $query->whereNull($column)->orWhere($column, '>', Carbon::now()->endOfDay());
        });

        $this->addWithPast($builder);
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

        $column = $model->getQualifiedEventEndsColumn();

        $bindingKey = 0;

        foreach ((array) $query->wheres as $key => $where)
        {
            if ($this->isEventEndConstraint($where, $column))
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

        $query->setBindings($bindings);
    }

    /**
     * Check if given where is the scope constraint.
     *
     * @param  array   $where
     * @param  string  $column
     * @return boolean
     */
    protected function isEventEndConstraint(array $where, $column)
    {
        $remove_after = Carbon::now()->endOfDay();
        $where_string = 'Null_' . $column . '_and';

        return (
            $where['type'] == 'Nested'
            && count($where['query']->wheres) === 2)
            && (strcasecmp(implode('_', $where['query']->wheres[0]), $where_string) === 0)
            && $where['query']->wheres[1]['column'] == $column
            && $where['query']->wheres[1]['operator'] === '>'
            && $where['query']->wheres[1]['value'] == $remove_after;
    }

    /**
     * Extend Builder with custom method.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $builder
     */
    protected function addWithPast(Builder $builder)
    {
        $builder->macro('withPast', function(Builder $builder)
        {
            $this->remove($builder, $builder->getModel());

            return $builder;
        });
    }
}
