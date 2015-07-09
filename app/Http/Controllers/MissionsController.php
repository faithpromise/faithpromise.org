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

        $trips = MissionLocation::load(['MissionTrip' => function($query) {
            $query->where('title', 'like', '%foo%');
//            dd($query->toSql());
        }])->where(function($query) {
//            dd($query->toSql());
        })->get();

        dd($trips);

        $sql = <<<SQL
            SELECT l.*, t.id, t.dates
            FROM mission_locations l
                LEFT JOIN mission_trips t ON t.id = (
                    SELECT tt.missionlocation_id
                    FROM mission_trips tt
                    WHERE tt.missionlocation_id = l.id
                    ORDER BY tt.expire_at DESC limit 1
                )
            WHERE (t.id IS NOT NULL) OR (l.is_continual = 1)
            ORDER BY l.id
SQL;

        $trips = DB::select($sql);

        dd($trips);

        $ministry_ident = 'missions';
        $ministry = Ministry::whereIdent($ministry_ident)->with('Staff')->first();
        $events = Event::where('ministry_id', '=', $ministry->id)->where('expire_at', '>', Carbon::now())->get();
        $trips = MissionTrip::with('MissionLocation')->whereNull('expire_at')->orWhere('expire_at', '>', Carbon::now())->get();
        $missionaries = Missionary::with('MissionLocation')->get();

        return view('missions', ['events' => $events, 'missionaries' => $missionaries, 'staff' => $ministry->staff, 'trips' => $trips]);
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