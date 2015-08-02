<?php

namespace App\Http\Controllers;

use App\Ministry;
use Illuminate\Support\Facades\Route;
use View;
use Illuminate\Routing\Controller as BaseController;

class MinistriesController extends BaseController {

    public function index($ministry_ident) {
        return view($ministry_ident);
    }

    public function fpKidsWelcome() {
        return view('fpkids-welcome');
    }

    public function defaultMinistryPage() {

        $ministry_ident = Route::getCurrentRoute()->getUri();

        return view($ministry_ident, [
            'ministry' => Ministry::whereIdent($ministry_ident)->first()
        ]);

    }

}