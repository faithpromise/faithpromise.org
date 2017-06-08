<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use FaithPromise\Shared\Models\Post;

class InfuseController extends Controller {

    public function index()
    {
        $result = [];
        $items = Post::where('type', '=', 'elevate_lesson')->get();

        foreach ($items as $item) {

            $result[] = [
                'postDate' => $item->publish_at,
                'slug'     => $item->slug,
                'title'    => $item->title,
                'subtitle' => $item->subtitle,
                'excerpt'  => $item->excerpt,
                'theUrl'   => $item->url,
                'image'    => url($item->image),
            ];
        }

        return $result;
    }

}
