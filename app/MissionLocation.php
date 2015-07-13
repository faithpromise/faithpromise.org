<?php

namespace App;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MissionLocation extends Model
{

    protected $dates = ['created_at', 'updated_at'];

    public function getUrlAttribute()
    {
        return '/missions/' . $this->ident;
    }

    public function getDatesProseAttribute()
    {
        $dates = [];

        foreach ($this->missiontrips as $trip) {
            $dates[] = $trip->date_range;
        }

        return implode(' &amp; ', $dates);
    }

//<?php
//if ($location->missiontrips->count() > 0) {
//$trip = $location->missiontrips->first();
//$dates = $trip->is_happening_now ? 'We\'re there right now' : $trip->dates;
//} else {
//    $dates = 'TBD';
//}
//

    public function missionaries()
    {
        return $this->hasMany('App\Missionary');
    }

    public function missionTrips()
    {
        return $this->hasMany('App\MissionTrip');
    }

    public function scopeUpcoming($query)
    {
        $query->where('is_continual', '=', 1)
            ->orWhereRaw(DB::raw('id in (select mission_location_id from mission_trips where ends_at > NOW() or ends_at IS NULL)'))
            ->with('missiontrips');
    }
}

