<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use \Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController {

    public function index(Request $request) {
        return view('students/index');
    }

}
