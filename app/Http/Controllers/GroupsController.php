<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class GroupsController extends BaseController {


    public function leaders() {
        return view('group_leaders');
    }

    public function newLeader() {
        return view('new-leader');
    }

}
