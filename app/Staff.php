<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function campus() {
        return $this->belongsTo('App\Campus');
    }

    public function teams() {
        return $this->belongsToMany('App\Team');
    }

    public function getThumbnail() {

        $default_thumbnail = 'https://placekitten.com/g/200/300';
        $staff_photo = config('site.staff_images_root') . '/' . $this->ident . '-square.jpg';
        $staff_photo_path = config('site.staff_images_dir') . '/' . $this->ident . '-square.jpg';
        $photo_url = file_exists($staff_photo_path) ? $staff_photo : $default_thumbnail;

        return $photo_url;
    }
}
