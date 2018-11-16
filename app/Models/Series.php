<?php

namespace App\Models;

class Series extends \FaithPromise\Shared\Models\Series{

    public function videos() {
        return $this->hasMany(Video::class)->orderBy('sermon_date');
    }

    public function alignmentResources() {
        return $this->hasMany(AlignmentResource::class)->orderBy('sort');
    }

    public function getTwitterShareUrlAttribute() {

        $twitter_text = 'Check out this @' . config('site.twitter') . ' series: ' . $this->title;
        $twitter_url = 'https://twitter.com/intent/tweet?text=' . urlencode($twitter_text) . '&url=' . $this->url;

        return $twitter_url;
    }

}