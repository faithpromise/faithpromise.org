<?php

namespace App\Http\Controllers\Craft;

use App\Models\Series;
use App\Http\Controllers\Controller;

class SeriesController extends Controller {

    public function index()
    {
        $result = [];
        $items = Series::orderBy('starts_at')->get();

        foreach ($items as $item) {

            $result[] = [
                'postDate'    => $item->publish_at,
                'slug'        => $item->slug,
                'title'       => $item->title,
                'description' => $item->description,
                'startsAt'    => $item->starts_at,
                'seriesImage' => $item->is_official ? url('/images/series/' . $item->slug . '-tall.jpg') : null,
            ];
        }

        return $result;
    }

}
