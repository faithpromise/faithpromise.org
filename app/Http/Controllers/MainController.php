<?php

namespace App\Http\Controllers;

use App\Event;
use App\FaithPromise\Stylesheet;
use App\Series;
use App\Team;
use F1\API;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class MainController extends BaseController {

    public function f1test() {

        session_start();

        $f1 = new API([
            'key'     => env('F1_KEY'),
            'secret'  => env('F1_SECRET'),
            'baseUrl' => env('F1_API_URI')
        ]);

//        $f1->login2ndParty(env('F1_USERNAME'), env('F1_PASSWORD'));
        $f1->login3rdParty($callback = "http://faithpromise.192.168.10.10.xip.io/f1-test");

        $request = $f1->households()->search(array(
            'lastUpdatedDate' => '2015-10-01',
        ))->get();

        dd($request);

    }

    public function index() {

        $current_series = Series::currentSeries()->first();
        $events = Event::orderBy('sort', 'asc')->take(3)->get();
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
