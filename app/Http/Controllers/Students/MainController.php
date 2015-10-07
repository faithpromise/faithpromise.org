<?php

namespace App\Http\Controllers\Students;

use \Illuminate\Routing\Controller as BaseController;
use \Illuminate\Support\Facades\Route;

class MainController extends BaseController {

    public function index() {
        return 'fpStudents index';
    }

}
