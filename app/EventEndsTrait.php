<?php

namespace App;

trait EventEndsTrait {

    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootEventEndsTrait()
    {
        static::addGlobalScope(new EventEndsScope);
    }

    /**
     * Get the name of the column for applying the scope.
     *
     * @return string
     */
    public function getEventEndsColumn()
    {
        return defined('static::ENDS_COLUMN') ? static::ENDS_COLUMN : 'ends_at';
    }

    /**
     * Get the fully qualified column name for applying the scope.
     *
     * @return string
     */
    public function getQualifiedEventEndsColumn()
    {
        return $this->getTable().'.'.$this->getEventEndsColumn();
    }

    /**
     * Get the query builder without the scope applied.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withPast()
    {
        return with(new static)->newQueryWithoutScope(new EventEndsScope);
    }
}
