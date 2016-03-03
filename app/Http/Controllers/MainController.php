<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\Series;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class MainController extends BaseController {

    public function index() {

        $current_series = Series::currentSeries()->first();
        $events = Event::featured()->get()->sortBy('sort');
        $icampus_times = Campus::findBySlug('online')->formatted_times;

        return view('home', [
            'current_series' => $current_series,
            'events'         => $events,
            'icampus_times'  => $icampus_times
        ]);
    }

    public function defaultPage() {
        $view = Route::getCurrentRoute()->getUri();

        return view($view);
    }

    public function easter() {

        $campuses = Campus::whereNotNull('opened_at')->orderBy('sort')->get();

        return view('easter', [
            'campuses' => $campuses
        ]);

    }

}
