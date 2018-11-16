<?php

namespace app\FaithPromise;

class Stylesheet {

    protected $url;
    protected $media;

    public function __construct($url) {
        $this->url = $url;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setMedia($media) {
        $this->media = $media;
        return $this;
    }

    public function getMedia() {
        return $this->hasMedia() ? $this->media : 'all';
    }

    public function hasMedia() {
        return isset($this->media);
    }

    static function make($url) {
        return new static($url);
    }

}