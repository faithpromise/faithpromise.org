<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionLocation extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at'];

    public function staff() {
        return $this->hasMany('App\Missionary');
    }
}
