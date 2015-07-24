<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Routing\Controller as BaseController;

class CampusesController extends BaseController {

    public function index() {

        $campuses = Campus::all();

        return view('locations', [
            'campuses' => $campuses
        ]);
    }

    public function detail() {
        return view('locations_detail');
    }

}