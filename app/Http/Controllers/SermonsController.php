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
            'permalink'     => route('seriesVideo', $latest_sermon->Series->slug, $latest_sermon->slug)
        ]);
    }

    public function series($series_slug) {

        $series = Series::where('slug', '=', $series_slug)->first();
        $videos = Video::with('Series')->with('Speaker')->where('series_id', '=', $series->id)->get();

        return view('series', [
            'series' => $series,
            'videos' => $videos
        ]);

    }

    public function video($series_slug, $video_slug) {

        $series = Series::whereSlug($series_slug)->first();
        $videos = Video::with('Series')->where('series_id', '=', $series->id)->get();
        $video = $videos->whereSlug($video_slug)->first();

        if (is_null($video)) {
            abort(404);
        }

        return view('series_video', [
            'series' => $series,
            'video' => $video,
            'videos' => $videos
        ]);

    }

}