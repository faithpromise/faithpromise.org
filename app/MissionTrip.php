<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionTrip extends Model
{
    protected $dates = ['starts_at', 'ends_at', 'created_at', 'updated_at'];

    public function missionlocation() {
        return $this->belongsTo('App\MissionLocation');
    }

    public function getIsHappeningNowAttribute() {
        return
            !is_null($this->starts_at)
            && $this->starts_at->isPast()
            && !is_null($this->ends_at)
            && $this->ends_at->isFuture();
    }

    public function getDateRangeAttribute() {

        if (is_null($this->starts_at) OR is_null($this->ends_at)) {
            return strlen($this->approximate_date) ? $this->approximate_date : '';
        }

        if ($this->starts_at->month != $this->ends_at->month) {
            return $this->starts_at->format('M j') . ' - ' . $this->ends_at->format('M j, Y');
        } else {
            return $this->starts_at->format('M j') . ' - ' . $this->ends_at->format('j, Y');
        }
    }

}
