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
            ->with(['missiontrips' => function ($query) {
                $query->where(function ($query) {
                    $query
                        ->whereNull('ends_at')
                        ->orWhere('ends_at', '>', Carbon::now());
                });
            }]);
    }
}

