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

    public function getThumbnailAttribute() {
        $img = 'images/staff/' . $this->ident . '-square.jpg';
        return asset_exists($img) ? $img : 'https://randomuser.me/api/portraits/lego/' . rand(0, 9) .'.jpg';

    }

    public function getHeroImageAttribute() {
        return 'images/staff/' . $this->ident . '-square.jpg';
        // TODO: Change to wide when we have wide images for staff
        // TODO: Add a default hero image if one doesn't exist?
    }

    public function getProfileNameAttribute() {
        return $this->display_name;
    }

    public function getProfileTitleAttribute() {
        return $this->title;
    }

    public function getProfileUrlAttribute() {
        return '/staff/' . $this->ident;
    }

    public function getProfileImageAttribute() {
        return $this->getThumbnailAttribute();
    }

}
