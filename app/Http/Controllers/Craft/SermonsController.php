<?php

namespace App\Http\Controllers\Craft;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SermonsController extends Controller {

    public function index(Request $request) {

        $limit = $request->get('limit', null);
        $page = $request->get('page', null);
        $offset = $limit ? ($page - 1) * $limit : 0;

        $result = [];
        $items = Video::with('speaker')
            ->with('series')
            ->where('site', '=', 'faithpromise')
            ->where('type', '=', 'sermon')
            ->orderBy('sermon_date')
            ->limit($limit)
            ->offset($offset)
            ->get();

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
                'videoUrl'       => $item->vimeo_id ? ('https://vimeo.com/' . $item->vimeo_id) : null,
                'aslVideoUrl'    => $item->vimeo_id_asl ? ('https://vimeo.com/' . $item->vimeo_id_asl) : null,
                'videoHdUrl'     => $item->vimeo_file_hd,
                'videoStreamUrl' => $item->vimeo_file_stream,
                'soundcloudId'   => $item->soundcloud_track_id,
                'audioUrl'       => $item->soundcloud_track_permalink ? ('https://soundcloud.com/faithpromise/' . $item->soundcloud_track_permalink) : null,
            ];
        }

        return $result;
    }
}
