<?php

namespace App\Http\Controllers;

use App\Series;
use App\Video;
use Illuminate\Routing\Controller as BaseController;

class SermonsController extends BaseController {

    public function index() {

        $latest_sermon = Video::where('type', '=', 'sermon')->orderBy('publish_at', 'desc')->first();

        $series = Series::where('is_official', '=', 1)->orderBy('publish_at', 'desc')->get();

        return view('sermons', [
            'series'        => $series,
            'latest_sermon' => $latest_sermon,
            'permalink'     => route('seriesVideo', $latest_sermon->Series->ident, $latest_sermon->ident)
        ]);
    }

    public function series($series_ident) {

        $series = Series::where('ident', '=', $series_ident)->first();

        return view('series', [
            'series' => $series
        ]);

    }

    public function video($series_ident, $video_ident) {

        $video = Video::where('ident', '=', $video_ident)->with('Series')->first();

        // TODO: Change to just get video with series

        if ($video->Series->ident !== $series_ident) {
            abort(404);
        }

        return view('series_video', [
            'video' => $video
        ]);

    }

}