<?php

namespace App\Http\Controllers;

use App\Course;
use App\Ministry;
use Illuminate\Routing\Controller as BaseController;

class GroupsController extends BaseController {

    public function index() {

        $ministry_slug = 'groups';

//        $courses = Course::has('coursetimes')->get();

        return view('groups', [
            'ministry' => Ministry::whereSlug($ministry_slug)->first()
        ]);

    }

    public function leaders() {
        return view('group_leaders');
    }

    public function newLeader() {
        return view('new-leader');
    }

}
