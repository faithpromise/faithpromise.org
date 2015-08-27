<?php

// http://softonsofa.com/laravel-5-eloquent-global-scope-how-to/

namespace App;

trait ExpiredTrait {

    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootExpiredTrait()
    {
        static::addGlobalScope(new ExpiredScope);
    }

    /**
     * Get the name of the column for applying the scope.
     *
     * @return string
     */
    public function getExpiredColumn()
    {
        return defined('static::EXPIRED_COLUMN') ? static::EXPIRED_COLUMN : 'expire_at';
    }

    /**
     * Get the fully qualified column name for applying the scope.
     *
     * @return string
     */
    public function getQualifiedExpiredColumn()
    {
        return $this->getTable().'.'.$this->getExpiredColumn();
    }

    /**
     * Get the query builder without the scope applied.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withExpired()
    {
        $instance = (new static)->newQueryWithoutScope(new ExpiredScope);
        return $instance;
    }
}
