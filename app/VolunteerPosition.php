<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolunteerPosition extends Model {

    use PublishedTrait;
    use ExpiredTrait;

    protected $dates = ['publish_at', 'expire_at', 'created_at', 'updated_at'];
    protected $fillable = ['ministry_id', 'title', 'description', 'availability', 'commitment', 'publish_at', 'expire_at'];

    public function skills() {
        return $this->belongsToMany('App\VolunteerSkill', 'volunteer_positions_skills');
    }

    public function ministry() {
        return $this->belongsTo('App\Ministry');
    }

}
