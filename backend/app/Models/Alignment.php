<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alignment extends Model{

    public function series() {
        return $this->belongsTo(Series::class);
    }

    public function resources() {
        return $this->hasMany(AlignmentResource::class)->orderBy('sort', 'asc');
    }

    public function getImageAttribute() {
        return 'images/alignments/' . $this->slug . '.jpg';
    }

}
