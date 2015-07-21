<?php

namespace App\Http\Controllers;

use App\Series;
use App\Video;
use Illuminate\Routing\Controller as BaseController;

class SermonsController extends BaseController {

    public function index() {

        $latest_sermon = Video::where('type', '=', 'sermon')->orderBy('publish_at', 'desc')->first();

        if ($latest_sermon->Series->is_official) {
            $hero_image = $latest_sermon->Series->hero_image;
        } else {
            $hero_image = $latest_sermon->Speaker;
        }

        $series = Series::where('is_official', '=', 1)->orderBy('publish_at', 'desc')->get();

        return view('sermons', [
            'series'        => $series,
            'latest_sermon' => $latest_sermon,
            'hero_image'    => $hero_image,
            'permalink'     => route('video', $latest_sermon->Series->ident, $latest_sermon->ident)
        ]);
    }

}