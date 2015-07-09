<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionLocation extends Model
{

    protected $dates = ['created_at', 'updated_at'];

    public function missionary() {
        return $this->hasMany('App\Missionary');
    }

    public function mission_trip() {
        return $this->hasMany('App\MissionTrip');
    }

    public function getUrl() {
        return '/missions/' . $this->ident;
    }
}
