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

    public function getThumbnail() {

        $default_thumbnail = 'https://placekitten.com/g/300/300';
        $missionary_photo = config('site.missionary_images_root') . '/' . $this->image;
        $missionary_photo_path = config('site.missionary_images_dir') . '/' . $this->image;
        $photo_url = file_exists($missionary_photo_path) ? $missionary_photo : $default_thumbnail;

        return $photo_url;
    }
}
