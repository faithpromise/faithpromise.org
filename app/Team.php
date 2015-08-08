<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Team extends Model implements SluggableInterface {

    use SoftDeletes;
    use SluggableTrait;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $sluggable = [
        'build_from'      => 'title',
        'save_to'         => 'slug',
        'unique'          => true,
        'include_trashed' => true
    ];

    public function staff() {
        return $this->belongsToMany('App\Staff')->orderBy('sort');
    }
}
