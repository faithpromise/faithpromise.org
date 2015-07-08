<?php

namespace App\Http\Controllers;

use App\Ministry;
use Illuminate\Routing\Controller as BaseController;

class MinistriesController extends BaseController
{

    public function index($ministry_ident)
    {

        $ministry = Ministry::with('Staff')->with('Event')->where('ident', $ministry_ident)->first();

        return view($ministry_ident, [
            'staff'  => $ministry->staff,
            'events' => $ministry->event
        ]);
    }

    public function fpKidsWelcome()
    {
        return view('fpkids-welcome');
    }

}