<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Course extends Model implements SluggableInterface {

    use SluggableTrait;

    protected $dates = ['created_at', 'updated_at'];

    protected $sluggable = [
        'build_from'      => 'name',
        'save_to'         => 'slug',
        'unique'          => true,
        'include_trashed' => true
    ];

    public function times() {
        return $this->hasMany('App\CourseTime');
    }

    public function getDateRangeAttribute() {

        if (is_null($this->starts_at) OR is_null($this->ends_at)) {
            return strlen($this->dates_text) ? $this->dates_text : '';
        }

        if ($this->starts_at->month != $this->ends_at->month) {
            return $this->starts_at->format('M j') . ' - ' . $this->ends_at->format('M j, Y');
        } else {
            return $this->starts_at->format('M j') . ' - ' . $this->ends_at->format('j, Y');
        }
    }

    public function getImageAttribute() {
        $image = $this->getOriginal('image');
        return 'images/courses/' . (!empty($image) ? $image : ($this->slug . '-tall.jpg'));
    }

    public function getUrlAttribute() {
        return route('courseDetail', ['course' => $this->slug]);
    }

    public function getCardTitleAttribute() {
        return $this->name;
    }

    public function getCardImageAttribute() {
        return $image = $this->getImageAttribute();
    }

    public function getCardUrlAttribute() {
        return $this->url;
    }

}
