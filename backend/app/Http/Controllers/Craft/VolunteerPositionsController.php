<?php

namespace App\Http\Controllers\Craft;

use App\Http\Controllers\Controller;
use FaithPromise\Shared\Models\VolunteerPosition;

class VolunteerPositionsController extends Controller {

    public function index() {
        $result = [];
        $items = VolunteerPosition::get();

        foreach ($items as $item) {

            $skills = [];

            foreach ($item->skills as $skill) {
                $skills[] = [
                    'title'       => $skill->title,
                    'slug'        => str_slug($skill->title),
                    'description' => $skill->description,
                ];
            }

            $result[] = [
                'postDate'     => $item->created_at,
                'title'        => $item->title,
                'slug'         => str_slug($item->title),
                'description'  => $item->description,
                'availability' => $item->availability,
                'commitment'   => $item->commitment,
                'ministryArea' => ['slug' => $item->ministry->slug, 'title' => $item->ministry->title],
                'skills'       => $skills,
            ];
        }

        return $result;
    }

}
