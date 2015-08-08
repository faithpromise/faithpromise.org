<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Campus extends Model implements SluggableInterface {

    use SoftDeletes;
    use SluggableTrait;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $sluggable = [
        'build_from'      => 'name',
        'save_to'         => 'slug',
        'unique'          => true,
        'include_trashed' => true
    ];

    public function staff() {
        return $this->hasMany('App\Staff')->orderBy('sort');
    }

    public function getUrlAttribute() {
        return '/locations/' . $this->slug;
    }

    public function getImageAttribute() {
        return 'images/campuses/' . $this->slug . '-wide.jpg';
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

    public function getCardImageAttribute() {
        return $this->getImageAttribute();
    }

    public function getCardUrlTextAttribute() {
        return 'More Details';
    }

    public function getCardUrlAttribute() {
        return $this->getUrlAttribute();
    }
}