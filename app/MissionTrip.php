<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionTrip extends Model
{
    protected $dates = ['expire_at', 'created_at', 'updated_at'];

    public function missionlocation() {
        return $this->belongsTo('App\MissionLocation');
    }

}
