<?php

namespace App\Http\Controllers;

use DB;
use App\Event;
use App\Ministry;
use App\Missionary;
use App\MissionTrip;
use App\MissionLocation;
use \Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class MissionsController extends BaseController
{

    public function index()
    {
        $ministry_ident = 'missions';
        $ministry = Ministry::whereIdent($ministry_ident)->with('Staff')->first();
        $events = Event::where('ministry_id', '=', $ministry->id)->where('expire_at', '>', Carbon::now())->get();
        $locations = MissionLocation::upcoming()->get();
        $missionaries = Missionary::with('missionlocation')->get();
//        dd($locations);

        return view('missions', ['events' => $events, 'missionaries' => $missionaries, 'staff' => $ministry->Staff, 'locations' => $locations]);
//        return view('missions_2', ['locations' => $locations]);
    }

    public function location($location_ident)
    {

        $location = MissionLocation::whereIdent($location_ident)->first();
        $trips = MissionTrip::where('missionlocation_id', '=', $location->id)->where(function ($query) {
            $query->whereNull('expire_at')->orWhere('expire_at', '>', Carbon::now());
        })->get();
        dd($past_trips->toArray());

        return view('missions_location', ['location' => $location]);

    }

}