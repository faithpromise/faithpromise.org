<?php

namespace App\Http\Controllers\Craft;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromosController extends Controller {
    public function index(Request $request) {

        $limit = $request->get('limit', null);
        $page = $request->get('page', null);
        $offset = $limit ? ($page - 1) * $limit : 0;

        $result = [];
        $items = Video::with('series')
            ->where('site', '=', 'faithpromise')
            ->where('type', '!=', 'sermon')
            ->orderBy('publish_at')
            ->limit($limit)
            ->offset($offset)
            ->get();

        foreach ($items as $item) {

            $result[] = [
                'series'         => $item->series ? $item->series->slug : null,
                'postDate'       => $item->publish_at,
                'slug'           => $item->slug . '-' . $item->id,
                'title'          => $item->title,
                // TODO: Keep description?
//                'description'    => $item->description,
                'videoUrl'       => $item->vimeo_id ? ('https://vimeo.com/' . $item->vimeo_id) : null,
                'videoHdUrl'     => $item->vimeo_file_hd,
                'videoStreamUrl' => $item->vimeo_file_stream,
            ];
        }

        return $result;
    }
}
