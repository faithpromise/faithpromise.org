<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ministry extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function staff() {
        return $this->belongsToMany('App\Staff', 'staff_ministry')->orderBy('sort');
    }

    public function events() {
        return $this->hasMany('App\Event')->orderBy('sort');
    }
}
