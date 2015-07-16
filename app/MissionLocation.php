<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class MissionLocation extends Model
{

    protected $dates = ['created_at', 'updated_at'];

    public function missionaries()
    {
        return $this->hasMany('App\Missionary');
    }

    public function missionTrips()
    {
        return $this->hasMany('App\MissionTrip');
    }

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

        return count($dates) ? implode(' &amp; ', $dates) : 'We\'re working on dates';;
    }

    public function getCardTitleAttribute() {
        return $this->name;
    }

    public function getCardSubtitleAttribute() {
        return $this->getDatesProseAttribute();
    }

    public function getCardImageAttribute()
    {
        return '/build/images/missions/locations/' . $this->ident . '-wide.jpg';
    }

    public function getCardUrlTextAttribute() {
        return 'Details';
    }

    public function getCardUrlAttribute() {
        return $this->getUrlAttribute();
    }

    public function scopeUpcoming($query)
    {
        $query->where('is_continual', '=', 1)
            ->orWhereRaw(DB::raw('id in (select mission_location_id from mission_trips where ends_at > NOW() or ends_at IS NULL)'))
            ->with('missiontrips');
    }
}
