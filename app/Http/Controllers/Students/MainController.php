<?php

namespace App\Http\Controllers\Students;

use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\Series;
use \Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController {

    public function index() {

        $events = Event::all()->sortBy('sort');

        return view('students/home', [
            'events' => $events
        ]);
    }

    public function whatToExpect() {
        return view('students/what-to-expect');
    }

}
