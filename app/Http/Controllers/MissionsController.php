<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\Ministry;
use FaithPromise\Shared\Models\Missionary;
use FaithPromise\Shared\Models\MissionTrip;
use FaithPromise\Shared\Models\MissionLocation;
use FaithPromise\Shared\Models\Organization;
use Illuminate\Routing\Controller as BaseController;

class MissionsController extends BaseController {

    public function index() {
        $ministry = Ministry::whereSlug('missions')->first();
        $staff = $ministry->staff;
        $locations = MissionLocation::upcoming()->get();
        $missionaries = Missionary::with('missionlocation')->get();

        return view('missions', ['ministry' => $ministry, 'missionaries' => $missionaries, 'staff' => $staff, 'locations' => $locations]);
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

        $organizations = Organization::localOutreach()->get();

        return view('organization', [
            'organizations' => $organizations,
            'organization'  => $organization
        ]);

    }

    public function kidsHope() {

        $kids_hope = Organization::whereSlug('kids-hope-usa')->first();

        return view('kids-hope', ['kids_hope' => $kids_hope]);

    }

}