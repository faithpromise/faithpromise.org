<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerSkill extends Model {

    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['title', 'description'];

    public function volunteer_positions() {
        return $this->belongsToMany('App\VolunteerPosition', 'volunteer_positions_skills');
    }

}
