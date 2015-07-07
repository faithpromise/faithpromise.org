<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function campus() {
        return $this->belongsTo('App\Campus');
    }

    public function staff() {
        return $this->belongsToMany('App\Team');
    }
}
