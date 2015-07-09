<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ministry;
use App\Missionary;
use App\MissionTrip;
use View;
use DB;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MinistriesController extends BaseController
{

    public function __construct(Request $request)
    {

        $route_params = $request->route()->parameters();

        $ministry_ident = isset($route_params['ministry']) ? $route_params['ministry'] : $request->route()->uri();

        $ministry = Ministry::whereIdent($ministry_ident)->with('Staff')->first();
        $events = Event::where('ministry_id', '=', $ministry->id)->where('expire_at', '>', Carbon::now())->get();

        View::share('staff', $ministry->staff);
        View::share('events', $events);
    }

    public function index($ministry_ident)
    {
        return view($ministry_ident);
    }

    public function missions()
    {
        $trips = MissionTrip::with('MissionLocation')->whereNull('expire_at')->orWhere('expire_at', '>', Carbon::now())->get();
        $missionaries = Missionary::with('MissionLocation')->get();

        return view('missions', ['missionaries' => $missionaries, 'trips' => $trips]);
    }

}