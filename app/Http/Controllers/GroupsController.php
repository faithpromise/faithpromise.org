<?php

namespace App\Http\Controllers;

use App\Study;
use App\StudyTime;
use App\Ministry;
use Illuminate\Routing\Controller as BaseController;

class GroupsController extends BaseController {

    public function index() {

        $ministry_slug = 'groups';

        return view('groups', [
            'ministry' => Ministry::whereSlug($ministry_slug)->first()
        ]);

    }

    public function studies() {

        $studies = Study::has('times')->get();

        return view('studies', [
            'studies' => $studies
        ]);
    }

    public function studyDetail($study) {

        $times = StudyTime::with('campus')->where('study_id', '=', $study->id)->get();
        $studies = Study::where('id', '<>', $study->id)->take(3)->get();

        return view('study_detail', [
            'study' => $study,
            'times' => $times,
            'studies' => $studies
        ]);
    }

    public function leaders() {
        return view('group_leaders');
    }

    public function newLeader() {
        return view('new-leader');
    }

}
