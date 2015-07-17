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

        $missionary_photo = config('site.missionary_images_root') . '/' . $this->image;
        $missionary_photo_path = config('site.missionary_images_dir') . '/' . $this->image;
        $photo_url = file_exists($missionary_photo_path) ? $missionary_photo : 'https://randomuser.me/api/portraits/lego/' . $this->id .'.jpg';

        return $photo_url;
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
