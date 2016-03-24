<?php

namespace App\Models;

class Video extends \FaithPromise\Shared\Models\Video{

    public function series() {
        return $this->belongsTo(Series::class);
    }

    public function getTwitterShareUrlAttribute() {

        $twitter_text = 'Check out this @' . config('site.twitter') . ' sermon: ' . $this->title;
        $twitter_url = 'https://twitter.com/intent/tweet?text=' . urlencode($twitter_text) . '&url=' . $this->url;

        return $twitter_url;
    }

}