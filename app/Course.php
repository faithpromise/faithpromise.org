<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $dates = ['created_at', 'updated_at'];

    public function coursetimes() {
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

    public function getCardTitleAttribute() {
        return $this->name;
    }

    public function getCardImageAttribute() {
        $image = $this->getOriginal('image');
        return 'images/courses/' . (!empty($image) ? $image : ($this->slug . '-tall.jpg'));
    }

    public function getCardUrlAttribute() {
        return 'groups/courses/' . $this->slug;
    }

}
