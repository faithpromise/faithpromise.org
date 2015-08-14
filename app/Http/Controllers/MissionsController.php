<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ministry;
use App\Missionary;
use App\MissionTrip;
use App\MissionLocation;
use Illuminate\Routing\Controller as BaseController;

class MissionsController extends BaseController {

    public function index() {
        $ministry = Ministry::whereSlug('missions')->first();
        $staff = $ministry->staff;
        $events = Event::where('ministry_id', '=', $ministry->id)->get();
        $locations = MissionLocation::upcoming()->get();
        $missionaries = Missionary::with('missionlocation')->get();

        return view('missions', ['events' => $events, 'missionaries' => $missionaries, 'staff' => $staff, 'locations' => $locations]);
    }

    public function location($location_slug) {

        $location = MissionLocation::whereSlug($location_slug)->first();
        $trips = MissionTrip::where('mission_location_id', '=', $location->id)->get();

        return view('missions_location', ['location' => $location, 'trips' => $trips]);

    }

}