<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PublishedTrait;
use App\EventEndsTrait;

class Event extends Model
{

    use PublishedTrait;
    use EventEndsTrait;

    protected $dates = ['starts_at', 'ends_at', 'publish_at', 'expires_at', 'created_at', 'updated_at'];

    public function ministry() {
        return $this->belongsTo('App\Ministry');
    }

    public function getThumbnail() {

        if (strlen($this->image)) {
            return '/build/images/events/' . $this->image;
        }

        return 'https://placekitten.com/g/200/300';
    }

}
