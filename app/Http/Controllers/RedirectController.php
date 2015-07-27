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

}
