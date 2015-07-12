<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MissionTrip extends Model
{
    protected $dates = ['starts_at', 'ends_at', 'expire_at', 'created_at', 'updated_at'];

    public function getIsHappeningNowAttribute() {
        return
            !is_null($this->starts_at)
            && $this->starts_at->isPast()
            && !is_null($this->ends_at)
            && $this->ends_at->isFuture();
    }

    public function missionlocation() {
        return $this->belongsTo('App\MissionLocation');
    }

}
