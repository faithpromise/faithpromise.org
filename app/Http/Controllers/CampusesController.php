<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Routing\Controller as BaseController;

class CampusesController extends BaseController {

    public function index() {

        $campuses = Campus::all();

        $campus_obj = [];
        foreach($campuses as $campus) {
            $campus_obj[$campus->ident] = [
                'ident' => $campus->ident,
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
                'times' => str_replace('; ', '<br>', $campus->times)
            ];
        }

        return view('locations', [
            'campuses' => $campuses,
            'campuses_json' => json_encode($campus_obj)
        ]);
    }

    public function detail($campus_ident) {

        $campus = Campus::whereIdent($campus_ident)->first();

        return view('locations_detail', [
            'campus' => $campus
        ]);

    }

}