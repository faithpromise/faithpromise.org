<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;
    static $random_id = 0;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function campus() {
        return $this->belongsTo('App\Campus');
    }

    public function teams() {
        return $this->belongsToMany('App\Team');
    }

    public function ministries() {
        return $this->belongsToMany('App\Ministry', 'staff_ministry');
    }

    public function getThumbnailAttribute() {

        $staff_photo = config('site.staff_images_root') . '/' . $this->ident . '-square.jpg';
        $staff_photo_path = config('site.staff_images_dir') . '/' . $this->ident . '-square.jpg';
        $photo_url = file_exists($staff_photo_path) ? $staff_photo : 'https://randomuser.me/api/portraits/lego/' . self::$random_id++ .'.jpg';

        if (self::$random_id > 9) {
            self::$random_id = 0;
        }

        return $photo_url;
    }
}
