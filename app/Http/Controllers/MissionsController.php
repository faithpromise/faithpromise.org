<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ministry;
use App\Missionary;
use App\MissionTrip;
use App\MissionLocation;
use App\Organization;
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

    public function loveLocal() {

        $organizations = Organization::localOutreach()->get();
        $kids_hope = $organizations->where('slug', 'kids-hope-usa')->first();

        return view('love-local', [
            'organizations' => $organizations,
            'kids_hope'     => $kids_hope
        ]);

    }

    public function organization($organization) {

        return view('organization', ['organization' => $organization]);

    }

    // TODO: Should we remove this in favor of organization page above?
    public function kidsHope() {

        $kids_hope = Organization::whereSlug('kids-hope-usa')->first();

        return view('kids-hope', ['kids_hope' => $kids_hope]);

    }

}