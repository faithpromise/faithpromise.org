<?php

// http://softonsofa.com/laravel-5-eloquent-global-scope-how-to/

namespace App;

use Carbon\Carbon;

trait PublishedTrait {

    /**
     * Boot the scope.
     *
     * @return void
     */
    public static function bootPublishedTrait()
    {
        static::addGlobalScope(new PublishedScope);
    }

    /**
     * Get the name of the column for applying the scope.
     *
     * @return string
     */
    public function getPublishedColumn()
    {
        return defined('static::PUBLISHED_COLUMN') ? static::PUBLISHED_COLUMN : 'publish_at';
    }

    /**
     * Get the fully qualified column name for applying the scope.
     *
     * @return string
     */
    public function getQualifiedPublishedColumn()
    {
        return $this->getTable().'.'.$this->getPublishedColumn();
    }

    /**
     * Get the query builder without the scope applied.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function withDrafts()
    {
        $instance = (new static)->newQueryWithoutScope(new PublishedScope);
        return $instance;
    }

    public function setPublishAtAttribute($date) {

        $format = 'Y-m-d H:i:s';
        $is_valid = false;

        if ($date instanceof Carbon) {
            return $date;
        }

        try {
            $date = Carbon::createFromFormat($format, $date);
            $is_valid = true;
        } catch (\Exception $e) {
        }

        if (!$is_valid) {

            try {
                $date = Carbon::parse($date);
                $is_valid = true;
            } catch (\Exception $e) {
            }
        }

        if (!$is_valid) {
            $date = null;
        }

        $this->attributes['publish_at'] = $date;

    }
}
