<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PublishedTrait;
use App\ExpiredTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Event extends Model implements SluggableInterface {

    use PublishedTrait;
    use ExpiredTrait;
    use SluggableTrait;

    protected $dates = ['publish_at', 'expires_at', 'created_at', 'updated_at'];

    protected $sluggable = [
        'build_from'      => 'title',
        'save_to'         => 'slug',
        'unique'          => false
    ];

    public function ministry() {
        return $this->belongsTo('App\Ministry');
    }

    public function calendar() {
        return $this->hasMany('App\CalendarEvent', 'event_number', 'calendar_event_number');
    }

    public function getImageAttribute() {

        if (strlen($this->getOriginal('image'))) {
            return 'images/events/' . $this->slug . '-tall.jpg';
        }

        return 'images/general/default-wide.jpg';
    }

    public function getUrlAttribute() {
        $url = $this->getOriginal('url');
        return strlen($url) ? $url : route('event', ['id' => $this->id, 'slug' => $this->slug]);
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
        return $this->getUrlAttribute();
    }

}
