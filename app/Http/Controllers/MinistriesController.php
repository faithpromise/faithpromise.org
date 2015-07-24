<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ministry;
use App\Missionary;
use App\MissionTrip;
use View;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MinistriesController extends BaseController {

    public function index($ministry_ident) {
        return view($ministry_ident);
    }

    public function fpKidsWelcome() {
        return view('fpkids-welcome');
    }

    public function defaultMinistryPage($ministry_ident) {

        return view($ministry_ident, [
            'ministry' => Ministry::whereIdent($ministry_ident)->first()
        ]);

    }

}