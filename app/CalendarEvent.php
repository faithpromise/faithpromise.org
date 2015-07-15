<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventEndsTrait;

class CalendarEvent extends Model
{

    use EventEndsTrait;

    protected $primary = 'id';
    protected $increments = false;
    protected $dates = ['starts_at', 'ends_at', 'created_at', 'updated_at'];

    public function calendar() {
        return $this->belongsTo('App\Event', 'calendar_event_number', 'event_number');
    }

}
