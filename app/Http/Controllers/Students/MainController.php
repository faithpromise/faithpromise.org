<?php

namespace App\Http\Controllers\Students;

use FaithPromise\Shared\Models\Series;
use Illuminate\Http\Request;
use \Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController {

    public function index(Request $request) {

        $current_series = Series::currentSeries()->first();

        return view('students/home', [
            'current_series' => $current_series
        ]);
    }

}
