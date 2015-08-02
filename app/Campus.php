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

    public function getImageAttribute() {
        return 'images/campuses/' . $this->ident . '-wide.jpg';
    }

    public function getTimesAttribute() {
        $times = json_decode($this->getOriginal('times'));
        return is_array($times) ? implode('; ', $times) : '';
    }

    public function getCardTitleAttribute() {
        return $this->location;
    }

    public function getCardSubtitleAttribute() {
        return $this->name . ' Campus';
    }

    public function getCardTextAttribute() {
        return str_replace('; ', '<br>', $this->times);
    }

    public function getCardImageAttribute()
    {
        return $this->getImageAttribute();
    }

    public function getCardUrlTextAttribute() {
        return 'More Details';
    }

    public function getCardUrlAttribute() {
        return $this->getUrlAttribute();
    }
}