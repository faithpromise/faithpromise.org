<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class RedirectController extends BaseController {

    public function sermons() {
        return redirect()->route('sermons');
    }

    public function nextSteps() {
        return redirect()->route('nextSteps');
    }

    public function locations() {
        return redirect()->route('locations');
    }

    public function biblePlan() {
        return redirect()->route('biblePlan');
    }

    public function youngAdults() {
        return redirect()->route('youngAdults');
    }

    public function newGroupLeader() {
        return redirect()->route('newGroupLeader');
    }

    public function loveLocal() {
        return redirect()->route('loveLocal');
    }

}
