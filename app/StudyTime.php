<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventEndsTrait;

class StudyTime extends Model {

    use EventEndsTrait;

    protected $dates = ['starts_at', 'ends_at', 'created_at', 'updated_at'];

    public function study() {
        return $this->belongsTo('App\Study');
    }

    public function campus() {
        return $this->belongsTo('App\Campus');
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

}
