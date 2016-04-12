<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

class AssetsController extends BaseController {

    public function resize($width, $image_path) {

        $src_path = config('site.assets_path') . '/' . $image_path;
        $compression = 80;
        $max_age_days = 30;

        if (!file_exists($src_path)) {
            return response('image not found', 404);
        }

        $img = Image::make($src_path);

        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $response = Response::make($img->encode(null, $compression), 200);
        $response->header('Content-Type', $img->mime());
        $response->header('Cache-Control', 'max-age=' . ($max_age_days * 24 * 60 * 60) . ', public');

        return $response;

    }

    public function image($display_size, $image_size, $image_path) {

        $max_age_days = 30;
        $pixel_density = 2;

        $display_sizes = [
            'sm' => 320,
            'md' => 480,
            'lg' => 600,
            'xl' => 960
        ];

        $image_sizes = [
            'full'    => 1,
            'half'    => .5,
            'third'   => .34,
            'quarter' => .25
        ];

        $compressions = [
            'sm' => 80,
            'md' => 80,
            'lg' => 80,
            'xl' => 80
        ];

        $src_path = config('site.assets_path') . '/' . $image_path;
        $new_width = (int)(($display_sizes[$display_size] * $pixel_density) * $image_sizes[$image_size]);
        $compression = $compressions[$display_size];
        $colors = (int)Input::get('colors');

        // Throw 404 if image does not exist
        if (!file_exists($src_path)) {
            return response('image not found', 404);
        }

        $img = Image::make($src_path);

        $img->resize($new_width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        if ($colors > 0) {
            $img->limitColors($colors, '#ffffff');
        }

        $response = Response::make($img->encode(null, $compression), 200);
        $response->header('Content-Type', $img->mime());
        $response->header('Cache-Control', 'max-age=' . ($max_age_days * 24 * 60 * 60) . ', public');

        return $response;

    }

    public function rawImage($path) {

        // http://s3browser.com/features-content-mime-types-editor.aspx
        $content_types = [
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'mp4' => 'video/mp4'
        ];

        $max_age_days = 30;
        $src_path = config('site.assets_path') . '/images/' . $path;
        $ext = pathinfo($src_path, PATHINFO_EXTENSION);

        $response = Response::make(file_get_contents($src_path));
        $response->header('Content-type', $content_types[$ext]);
        $response->header('Cache-Control', 'max-age=' . ($max_age_days * 24 * 60 * 60) . ', public');

        return $response;

    }

    public function doc($path) {

        $file_path = asset_path('docs/' . $path);

        $file_path_parts = explode('/', $file_path);

        return Response::make(file_get_contents($file_path), 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; ' . end($file_path_parts)
        ]);

    }

}