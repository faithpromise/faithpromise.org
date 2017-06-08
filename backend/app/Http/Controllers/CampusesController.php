<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\Post;
use Illuminate\Routing\Controller as BaseController;

class CampusesController extends BaseController {

    public function index() {

        $campuses = Campus::orderBy('sort')->get();

        $campus_obj = [];
        foreach($campuses as $campus) {
            $campus_obj[$campus->slug] = [
                'slug' => $campus->slug,
                'name' => $campus->name,
                'title' => $campus->name . ' Campus',
                'location' => $campus->location,
                'address' => $campus->address,
                'city' => $campus->city,
                'state' => $campus->state,
                'zip' => $campus->zip,
                'lat' => $campus->lat,
                'lng' => $campus->lng,
                'map_url' => $campus->map_url,
                'directions_url' => $campus->directions_url,
                'thumbnail' => cdn_image('sm', 'full', $campus->image, 'wide'),
                'url' => $campus->url,
                'times' => str_replace(', ', '<br>', $campus->formatted_times)
            ];
        }

        return view('locations', [
            'campuses' => $campuses,
            'campuses_json' => json_encode($campus_obj)
        ]);
    }

    public function detail($campus) {

        return view('locations_detail', [
            'campus' => $campus,
            'what_to_expect_cards' => Post::whereType('about_us')->orderBy('sort')->get()
        ]);

    }

    public function farragut() {

        $campus = Campus::withTrashed()->whereSlug('farragut')->first();

        return view('locations_farragut', [
            'campus' => $campus,
            'what_to_expect_cards' => Post::whereType('about_us')->orderBy('sort')->get()
        ]);

    }

}