<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Scope;

class GroupScope implements Scope {

    public function apply(Builder $builder, Model $model) {
        $builder->whereNotNull('detail_last_updated');
    }

}

class Group extends Model {

    public static function boot() {
        static::addGlobalScope(new GroupScope);
        parent::boot();
    }

}
