<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use FaithPromise\Shared\Models\Missionary;

class MissionariesController extends Controller {

    public function index()
    {
        $result = [];
        $items = Missionary::all();

        foreach ($items as $item) {

            $result[] = [
                'postDate' => $item->created_at,
                'enabled'  => $item->deleted_at ? 0 : 1,
                'slug'     => $item->slug,
                'title'    => $item->name,
                'theUrl'   => $item->url,
                'image'    => url($item->image),
                'location' => $item->missionLocation->slug,
            ];
        }

        return $result;
    }

}
