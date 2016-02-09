<?php

namespace App\Http\Controllers\Students;

use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\Series;
use \Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController {

    public function index() {

        return view('students/home', [
            'current_series' => Series::currentSeries()->first(),
            'events'         => Event::featured()->get()->sortBy('sort')
        ]);
    }

}
