<?php

namespace App\Http\Controllers;

use DB;
use App\Event;
use App\Ministry;
use App\Missionary;
use App\MissionTrip;
use App\MissionLocation;
use Illuminate\Routing\Controller as BaseController;

class MissionsController extends BaseController
{

    public function index()
    {
        $ministry = Ministry::whereIdent('missions')->first();
        $staff = $ministry->staff;
        $events = Event::where('ministry_id', '=', $ministry->id)->get();
        $locations = MissionLocation::upcoming()->get();
        $missionaries = Missionary::with('missionlocation')->get();

        return view('missions', ['events' => $events, 'missionaries' => $missionaries, 'staff' => $staff, 'locations' => $locations]);
    }

    public function location($location_ident)
    {

        $location = MissionLocation::whereIdent($location_ident)->first();
        $trips = MissionTrip::where('missionlocation_id', '=', $location->id)->get();
        dd($past_trips->toArray());

        return view('missions_location', ['location' => $location]);

    }

}