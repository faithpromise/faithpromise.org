<?php

namespace App\Http\Controllers;

use App\VolunteerPosition;
use App\VolunteerSkill;
use Illuminate\Routing\Controller as BaseController;

class VolunteerController extends BaseController {

    public function index() {

        return view('serve');

    }

    public function positions() {

        return view('volunteer_positions');

    }

    public function positionsJson() {

        return $skills = VolunteerSkill::with('positions')->get();

    }

}
