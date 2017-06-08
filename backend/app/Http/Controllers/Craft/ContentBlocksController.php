<?php

namespace App\Http\Controllers\Craft;

use FaithPromise\Shared\Models\Post;
use App\Http\Controllers\Controller;

class ContentBlocksController extends Controller {

    public function index()
    {
        $result = [];
        $items = Post::whereIn('type', ['about_us', 'group_leader_resource'])->get();

        foreach ($items as $item) {

            $result[] = [
                'postDate' => $item->publish_at,
                'slug'     => $item->slug,
                'title'    => $item->title,
                'subtitle' => $item->subtitle,
                'excerpt'  => $item->excerpt,
                'theUrl'   => $item->url,
                'linkText' => $item->url_text,
//                'image'    => url($item->image),
            ];
        }

        return $result;
    }

}
