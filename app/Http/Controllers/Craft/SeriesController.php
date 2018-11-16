<?php

namespace App\Http\Controllers\Craft;

use App\Models\Series;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class SeriesController extends Controller {

    public function index(Request $request) {

        $limit = $request->get('limit', null);
        $page = $request->get('page', null);
        $offset = $limit ? ($page - 1) * $limit : 0;

        $result = [];
        $items = Series::orderBy('starts_at')->limit($limit)->offset($offset)->get();

        foreach ($items as $item) {

            $first_sermon = Video::where('series_id', '=', $item->id)->where('type', '=', 'sermon')->orderBy('sermon_date', 'ASC')->first();

            $result[] = [
                'postDate'          => $first_sermon ? $first_sermon->sermon_date : $item->starts_at,
                'slug'              => $item->slug,
                'title'             => $item->title,
                'description'       => $item->description,
                'startsAt'          => $first_sermon ? $first_sermon->sermon_date : $item->starts_at,
                'seriesImageTall'   => $item->is_official ? url('/images/series/' . $item->slug . '-tall.jpg') : null,
                'seriesImageWide'   => $item->is_official ? url('/images/series/' . $item->slug . '-wide.jpg') : null,
                'seriesImageSquare' => $item->is_official ? url('/images/series/' . $item->slug . '-square.jpg') : null,
                'seriesIsOfficial'  => $item->is_official,
            ];
        }

        return $result;
    }

}
