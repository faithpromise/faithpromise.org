<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class MainController extends BaseController {

    public function index() {
        return view('welcome');
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
