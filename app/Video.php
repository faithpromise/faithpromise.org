<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PublishedTrait;

class Video extends Model {

    use PublishedTrait;

    protected $dates = ['sermon_date', 'publish_at', 'created_at', 'updated_at'];

    public function series() {
        return $this->belongsTo('App\Series');
    }

    public function speaker() {
        return $this->belongsTo('App\Staff', 'id', 'speaker_id');
    }

}