<?php

namespace App\Http\Controllers\Craft;

use App\Models\Video;
use App\Http\Controllers\Controller;

class SermonsController extends Controller {

    public function index()
    {
        $result = [];
        $items = Video::with('speaker')->with('series')->where('site', '=', 'faithpromise')->where('type', '=', 'sermon')->orderBy('sermon_date')->get();

        foreach ($items as $item) {

            $result[] = [
                'series'         => $item->series ? $item->series->slug : null,
                'postDate'       => $item->publish_at,
                'slug'           => $item->slug,
                'title'          => $item->title,
                // TODO: Keep description?
//                'description'    => $item->description,
                'speaker'        => $item->speaker ? $item->speaker->slug : null,
                'guestSpeaker'   => $item->speaker ? null : $item->speaker_name,
                'sermonDate'     => $item->sermon_date,
                'vimeoId'        => $item->vimeo_id,
                'aslVimeoId'     => $item->vimeo_id_asl,
                'soundcloudId'   => $item->soundcloud_track_id,
                'soundcloudSlug' => $item->soundcloud_track_permalink,
                'vimeoHdUrl'     => $item->vimeo_file_hd,
                'vimeoStreamUrl' => $item->vimeo_file_stream,
            ];
        }

        return $result;
    }
}
