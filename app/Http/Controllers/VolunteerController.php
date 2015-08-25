<?php

namespace App\Http\Controllers;

use App\VolunteerPosition;
use Illuminate\Routing\Controller as BaseController;

class VolunteerController extends BaseController {

    public function index() {

        return view('serve');

    }

}
