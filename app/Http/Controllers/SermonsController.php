<?php

namespace App\Http\Controllers;

use App\Series;
use App\Video;
use Illuminate\Routing\Controller as BaseController;

class SermonsController extends BaseController {

    public function index() {

        $latest_sermon = Video::where('type', '=', 'sermon')->orderBy('publish_at', 'desc')->first();

        if ($latest_sermon->Series->is_official) {
            $hero_images = [
                'sm' => cdn_image('sm', 'full', 'images/series/' . $latest_sermon->Series->ident . '-tall.jpg'),
                'md' => cdn_image('md', 'full', 'images/series/' . $latest_sermon->Series->ident . '-wide.jpg'),
                'lg' => cdn_image('lg', 'full', 'images/series/' . $latest_sermon->Series->ident . '-wide.jpg'),
                'xl' => series_fade_image($latest_sermon->Series->ident)
            ];
        } else {
            $hero_images = [
                'sm' => cdn_image('sm', 'full', $latest_sermon->Speaker->hero_image),
                'md' => cdn_image('md', 'full', $latest_sermon->Speaker->hero_image),
                'lg' => cdn_image('lg', 'full', $latest_sermon->Speaker->hero_image),
                'xl' => cdn_image('xl', 'full', $latest_sermon->Speaker->hero_image)
            ];
        }

        $series = Series::where('is_official', '=', 1)->orderBy('publish_at', 'desc')->get();

        return view('sermons', [
            'series'        => $series,
            'latest_sermon' => $latest_sermon,
            'hero_images'    => $hero_images,
            'permalink'     => route('video', $latest_sermon->Series->ident, $latest_sermon->ident)
        ]);
    }

}