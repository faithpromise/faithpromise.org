<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerPosition extends Model {

    public function skills() {
        return $this->belongsToMany('App\VolunteerSkill', 'volunteer_positions_skills');
    }

}
