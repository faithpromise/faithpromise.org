<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Event;
use App\FaithPromise\Stylesheet;
use FaithPromise\Shared\Models\Series;
use FaithPromise\Shared\Models\Team;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class MainController extends BaseController {

    public function index() {

        $current_series = Series::currentSeries()->first();
        $events = Event::featured()->get()->sortBy('sort');
        $stylesheet = new Stylesheet($current_series->home_css);

        return view('welcome', [
            'current_series' => $current_series,
            'events' => $events,
            'stylesheets' => [$stylesheet]
        ]);
    }

    public function staff() {

        $staff_by_teams = Team::with('Staff')->get();

        return view('staff', [
            'teams' => $staff_by_teams
        ]);
    }

    public function defaultPage() {
        $view = Route::getCurrentRoute()->getUri();
        return view($view);
    }

}
