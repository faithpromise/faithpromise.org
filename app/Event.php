<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PublishedTrait;
use App\ExpiredTrait;

class Event extends Model
{

    use PublishedTrait;
    use ExpiredTrait;

    protected $dates = ['publish_at', 'expires_at', 'created_at', 'updated_at'];

    public function ministry() {
        return $this->belongsTo('App\Ministry');
    }

    public function calendar() {
        return $this->hasMany('App\CalendarEvent', 'event_number', 'calendar_event_number');
    }

    public function getImageAttribute() {

        if (strlen($this->getOriginal('image'))) {
            return 'images/events/' . $this->getOriginal('image');
        }

        return 'images/general/default-wide.jpg';
    }

    public function getCardTitleAttribute() {
        return $this->title;
    }

    public function getCardSubtitleAttribute() {
        return $this->dates_text;
    }

    public function getCardTextAttribute() {
        return $this->excerpt;
    }

    public function getCardImageAttribute()
    {
        return $this->image;
    }

    public function getCardUrlTextAttribute() {
        return 'More Details';
    }

    public function getCardUrlAttribute() {
        return strlen($this->url) ? $this->url : '/events/' . $this->id;
    }

}
