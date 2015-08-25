<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerSkill extends Model {

    public function positions() {
        return $this->belongsToMany('App\VolunteerPosition', 'volunteer_positions_skills');
    }

}
