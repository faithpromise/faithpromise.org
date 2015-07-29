<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function staff() {
        return $this->hasMany('App\Staff')->orderBy('sort');
    }

    public function getUrlAttribute() {
        return '/locations/' . $this->ident;
    }

    public function getThumbnailAttribute() {
        return 'images/campuses/' . $this->ident . '-wide.jpg';
    }

    public function getCardTitleAttribute() {
        return $this->location;
    }

    public function getCardSubtitleAttribute() {
        $times = json_decode($this->times);
        return '<p>' . implode('<br>', $times) . '</p>';
    }

    public function getCardImageAttribute()
    {
        return $this->getThumbnailAttribute();
    }

    public function getCardUrlTextAttribute() {
        return 'More Details';
    }

    public function getCardUrlAttribute() {
        return $this->getUrlAttribute();
    }
}
