<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PublishedTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Video extends Model implements SluggableInterface {

    use PublishedTrait;
    use SluggableTrait;

    protected $dates = ['sermon_date', 'publish_at', 'created_at', 'updated_at'];

    protected $sluggable = [
        'build_from'      => 'title',
        'save_to'         => 'slug',
        'unique'          => false
    ];

    public function series() {
        return $this->belongsTo('App\Series');
    }

    public function speaker() {
        return $this->belongsTo('App\Staff', 'speaker_id', 'id');
    }

    public function getImageAttribute() {
        $series = $this->Series;
        if ($series->is_official) {
            return 'images/series/' . $series->slug . '-tall.jpg';
        } else {
            return $this->Speaker->image;
        }
    }

    public function getUrlAttribute() {
        return route('seriesVideo', ['series' => $this->Series->slug, 'video' => $this->slug]);
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
        return ($this->type != 'sermon' || is_null($this->sermon_date)) ? '' : $this->sermon_date->format('M d, Y');
    }

}