<?php

namespace App\Http\Controllers\Craft;

use App\Models\Video;
use App\Http\Controllers\Controller;

class PromosController extends Controller {
    public function index()
    {
        $result = [];
        $items = Video::with('series')->where('site', '=', 'faithpromise')->where('type', '!=', 'sermon')->orderBy('publish_at')->get();

        foreach ($items as $item) {

            $result[] = [
                'series'         => $item->series ? $item->series->slug : null,
                'postDate'       => $item->publish_at,
                'slug'           => $item->slug,
                'title'          => $item->title,
                // TODO: Keep description?
//                'description'    => $item->description,
                'vimeoId'        => $item->vimeo_id,
            ];
        }

        return $result;
    }
}
