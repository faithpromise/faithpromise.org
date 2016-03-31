<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Video;
use Illuminate\Routing\Controller as BaseController;

class SermonsController extends BaseController {

    public function index() {

        $latest_sermon = Video::where('type', '=', 'sermon')->orderBy('publish_at', 'desc')->first();

        $series = Series::has('videos')->where('is_official', '=', 1)->orderBy('publish_at', 'desc')->get();

        return view('sermons', [
            'series'        => $series,
            'latest_sermon' => $latest_sermon,
            'permalink'     => route('seriesVideo', ['series' => $latest_sermon->Series->slug, 'series_video' => $latest_sermon->slug])
        ]);
    }

    public function series($series) {

        $videos = Video::with('Series')->with('Speaker')->where('series_id', '=', $series->id)->orderBy('publish_at', 'desc')->get();
        $alignment_resources = $series->alignmentResources;

        return view('series', [
            'series'              => $series,
            'videos'              => $videos,
            'alignment_resources' => $alignment_resources
        ]);

    }

    public function video($series, $video) {

        $videos = Video::with('Series')->where('series_id', '=', $series->id)->orderBy('sermon_date', 'asc')->get();

        return view('series_video', [
            'series' => $series,
            'video'  => $video,
            'videos' => $videos
        ]);

    }

}