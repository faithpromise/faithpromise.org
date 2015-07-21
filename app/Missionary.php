<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Missionary extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function missionLocation() {
        return $this->belongsTo('App\MissionLocation');
    }

    public function getThumbnailAttribute() {
        return profile_image_url('images/missions/missionaries/' . $this->ident . '-square.jpg');
    }

    public function getProfileNameAttribute() {
        return $this->name;
    }

    public function getProfileTitleAttribute() {
        return $this->missionlocation->name;
    }

    public function getProfileUrlAttribute() {
        return $this->url;
    }

    public function getProfileImageAttribute() {
        return $this->getThumbnailAttribute();
    }
}
