<?php

namespace App\Http\Controllers\Craft;

use Carbon\Carbon;
use FaithPromise\Shared\Models\Post;
use App\Http\Controllers\Controller;

class EventLinksController extends Controller {

    public function index() {
        $after = Carbon::create(2015, 1, 1);
        $result = [];
        $items = Post::where('type', '=', 'event')
            ->where('publish_at', '>=', $after)
            ->whereNotNull('url')
            ->where(function($query) {
                $query->where('site', '=', 'faithpromise')->orWhereNull('site');
            })
            ->get();

        foreach ($items as $item) {

            $image_path = preg_replace('/(-(square|tall|wide))?\.jpg$/', '-tall.jpg', $item->image);
            $image_url = 'http://faithpromise.org/' . $image_path;
            $has_image = file_exists(storage_path('assets/' . $image_path));

            $result[] = [
                'postDate'    => $item->publish_at,
                'expiryDate'  => $item->expire_at,
                'slug'        => $item->slug,
                'title'       => $item->title,
                'subtitle'    => $item->subtitle,
                'excerpt'     => $item->excerpt,
                'description' => $item->description,
                'theUrl'      => $item->url,
                'linkText'    => $item->url_text,
                'image'       => $has_image ? $image_url : null,
                'ministries'  => $item->ministry_id ? [$item->ministry->slug] : [],
            ];
        }

        return $result;
    }

}
