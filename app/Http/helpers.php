<?php

function asset_path($path) {
    return config('site.assets_path') . '/' . $path;
}

function asset_exists($path) {
    return file_exists(asset_path($path));
}

function cdn_image($display_width, $image_width, $image_path, $format = null, $url_params = '') {

    // Not a local image. Return
    if ('images/' !== substr($image_path, 0, 7)) {
        return $image_path;
    }

    if ($format !== null) {
        $format_suffix = '-' . $format . '.jpg';
        $image_path = preg_replace('/(-(square|tall|wide))?\.jpg$/', $format_suffix, $image_path);
    }

    $url_params = explode('&', $url_params);

    if (asset_exists($image_path)) {
        array_unshift($url_params, 'v=' . filemtime(asset_path($image_path)));
    }

    $img_url = config('site.cdn_url') . '/' . $display_width . '/' . $image_width . '/' . $image_path . (count($url_params) ? '?' . implode('&', $url_params) : '');

    return $img_url;
}

function series_fade_image($series_ident) {
    $image_path = asset_path('images/series/' . $series_ident . '.jpg');
    $img_hash = asset_exists($image_path) ? '?v=' . filemtime(asset_path($image_path)) : '';
    $img_url = config('site.cdn_url') . '/series-fade-out/' . $series_ident . '.jpg' . $img_hash;

    return $img_url;
}