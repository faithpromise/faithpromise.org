<?php

// TODO: add second argument $size that uses a different route

function asset_path($path) {
    return config('site.assets_path') . '/' . $path;
}

function asset_exists($path) {
    return file_exists(asset_path($path));
}

function cdn_image($display_width, $image_width, $image_path) {
    if ('images/' !== substr($image_path, 0, 7)) {
        return $image_path;
    }
    $img_hash = asset_exists($image_path) ? '?v=' . filemtime(asset_path($image_path)) : '';
    $img_url = config('site.cdn_url') . '/' . $display_width . '/' . $image_width . '/' . $image_path . $img_hash;
    return $img_url;
}
