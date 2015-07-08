<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['created_at', 'updated_at'];

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
