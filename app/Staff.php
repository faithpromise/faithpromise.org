<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model {
    use SoftDeletes;

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

    public function getUrlAttribute() {
        return '/staff/' . $this->ident;
    }

    public function getImageAttribute() {
        $img = 'images/staff/' . $this->ident . '-square.jpg';
        return asset_exists($img) ? $img : 'images/staff/default-square.jpg';
    }

    public function get8bitPathAttribute() {
        return 'images/staff/' . $this->ident . '-8bit-square.jpg';
    }

    public function getProfileNameAttribute() {
        return $this->display_name;
    }

    public function getProfileTitleAttribute() {
        return $this->title;
    }

    public function getProfileUrlAttribute() {
        return $this->getUrlAttribute();
    }

    public function getProfileImageAttribute() {
        return $this->getImageAttribute();
    }

}
