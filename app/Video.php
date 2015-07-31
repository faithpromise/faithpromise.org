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
        return $this->belongsTo('App\Staff', 'speaker_id', 'id');
    }

    public function getImageAttribute() {
        $series = $this->Series;
        if ($series->is_official) {
            return 'images/series/' . $series->ident . '-tall.jpg';
        } else {
            return $this->Speaker->image;
        }
    }

    public function getUrlAttribute() {
        return route('seriesVideo', ['series' => $this->Series->ident, 'video' => $this->ident]);
    }

    public function getSpeakerDisplayNameAttribute() {
        if (strlen($this->speaker_name)) {
            return $this->speaker_name;
        }
        if (! is_null($this->Speaker)) {
            return $this->Speaker->display_name;
        }
        return '';
    }

    public function getSermonDateFormattedAttribute() {
        return is_null($this->sermon_date) ? '' : $this->sermon_date->format('M d, Y');
    }

}