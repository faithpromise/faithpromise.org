<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PublishedTrait;

class Series extends Model {

    use PublishedTrait;

    protected $dates = ['starts_at', 'publish_at', 'created_at', 'updated_at'];

    public function videos() {
        return $this->hasMany('App\Video');
    }

    public function getHeroImageAttribute() {
        return 'images/series/' . $this->ident . '-wide.jpg';
    }

    public function getAlbumImageAttribute() {
        return 'images/series/' . $this->ident . '-square.jpg';
    }

    public function getWhenAttribute() {
        return $this->starts_at->format('b Y');

//{% if item.starts_on > site.time or latest_sermon_series.ident == item.ident %}
//<series-date starts="{{ item.starts_on }}" next-series-starts="{{ next_series_starts }}"></series-date>
//{% else %}
//{{ $this->starts_at->format('b Y') }}
//{% endif %}
    }

}
