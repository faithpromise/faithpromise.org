<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Huddle\Zendesk\Facades\Zendesk;

class SupportRequestsController extends BaseController {

    public function index() {

        $tickets = Zendesk::tickets()->findAll();
        dd($tickets);

    }

}
