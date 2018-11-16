<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use App\Models\Alignment;

class AlignmentsController extends Controller {
    public function index()
    {
        $result = [];
        $items = Alignment::all();

        foreach ($items as $item) {

            $resources = [];

            foreach ($item->resources()->orderBy('sort')->get() as $resource) {

                $is_file = strpos($resource->url, '/docs') === 0;

                $resources[] = [
                    'linkName' => $resource->title,
                    'linkUrl'  => $is_file ? null : 'http://faithpromise.org' . $resource->url,
                    'fileUrl'  => $is_file ? 'http://faithpromise.org' . $resource->url : null,
                ];
            }

            $result[] = [
                'postDate'  => $item->publish_at,
                'slug'      => $item->slug,
                'title'     => $item->title,
                'image'     => 'http://faithpromise.org/images/alignments/' . $item->slug . '.jpg',
                'resources' => $resources,
                'series'    => $item->series->slug,
            ];
        }

        return $result;
    }
}
