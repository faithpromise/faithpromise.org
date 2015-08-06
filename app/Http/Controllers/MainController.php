<?php

namespace App\Http\Controllers;

use App\Event;
use App\Series;
use App\Team;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class MainController extends BaseController {

    public function index() {

        $current_series = Series::currentSeries()->first();
        $events = Event::orderBy('sort', 'asc')->take(3)->get();

        return view('welcome', [
            'current_series' => $current_series,
            'events' => $events,
            'stylesheets' => [
                $current_series->home_css
            ]
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
