<?php

namespace App\Http\Controllers\Students;

use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\StudentCampus;
use Illuminate\Routing\Controller as BaseController;

class CampusesController extends BaseController {

    public function index() {

        $campuses = StudentCampus::orderBy('sort')->get();

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
                'times' => str_replace('; ', '<br>', $campus->formatted_student_times)
            ];
        }

        return view('students/locations', [
            'campuses' => $campuses,
            'campuses_json' => json_encode($campus_obj)
        ]);
    }

    public function farragut() {

        $campus = Campus::withTrashed()->whereSlug('farragut')->first();

        return view('locations_farragut', [
            'campus' => $campus,
        ]);

    }

    public function detail($campus) {

        return view('students/locations_detail', [
            'campus' => $campus
        ]);

    }

}