<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use FaithPromise\Shared\Models\Post;

class GroupLeaderResourcesController extends Controller {
    public function index()
    {
        $result = [];
        $items = Post::whereIn('type', ['group_leader_video', 'new_group_leader_video'])->get();

        foreach ($items as $item) {

            $image_path = preg_replace('/(-(square|tall|wide))?\.jpg$/', '-tall.jpg', $item->image);

            $result[] = [
                'postDate'            => $item->publish_at,
                'slug'                => $item->slug,
                'title'               => $item->title,
                'subtitle'            => $item->subtitle,
                'description'         => $item->description,
                'theUrl'              => $item->url,
                'linkText'            => $item->url_text,
                'image'               => url($image_path),
                'isForNewGroupLeader' => ($item->type === 'new_group_leader_video'),
            ];
        }

        return $result;
    }

}
