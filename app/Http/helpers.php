<?php

// TODO: add second argument $size that uses a different route

function profile_image_url($path) {

    $src = base_path($path);
    if (file_exists($src)) {
        return config('site.cdn_url') . route('profile_image', ['path' => $path, 'version' => hash_file('md5', $src)], false);
    }
    return 'https://randomuser.me/api/portraits/lego/' . rand(0, 9) .'.jpg';

}

function card_image_url($path) {

    $src = base_path($path);
    if (file_exists($src)) {
        return config('site.cdn_url') . route('card_image', ['path' => $path, 'version' => hash_file('md5', $src)], false);
    }
    // TODO: Replace with default card image
    return 'https://randomuser.me/api/portraits/lego/' . rand(0, 9) .'.jpg';

}

function album_image_url($path) {

    $src = base_path($path);
    if (file_exists($src)) {
        return config('site.cdn_url') . route('album_image', ['path' => $path, 'version' => hash_file('md5', $src)], false);
    }
    return 'https://randomuser.me/api/portraits/lego/' . rand(0, 9) .'.jpg';

}
