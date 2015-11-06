<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Study;
use FaithPromise\Shared\Models\StudyTime;
use FaithPromise\Shared\Models\Ministry;
use FaithPromise\Shared\Models\VolunteerPosition;
use Illuminate\Routing\Controller as BaseController;

class GroupsController extends BaseController {

    public function index() {

        $position = VolunteerPosition::withDrafts()->withExpired()->find(1);

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

        $orderBy = "gender = '" . $study->gender . "' desc, RAND()";

        $studies = Study::where('id', '<>', $study->id)->orderByRaw($orderBy)->take(3)->get();

        return view('study_detail', [
            'study'   => $study,
            'times'   => $times,
            'studies' => $studies
        ]);
    }

    public function leaders() {
        return view('group_leaders');
    }

    public function newLeader() {
        return view('new-leader');
    }

    public function men() {

        $ministry = Ministry::whereSlug('men')->first();
        $studies = Study::where('gender', '=', 'm')->get();
        $events = $ministry->Events->merge($studies);

        return view('men', [
            'ministry' => $ministry,
            'events'   => $events
        ]);
    }

    public function women() {

        $ministry = Ministry::whereSlug('women')->first();
        $studies = Study::where('gender', '=', 'f')->get();
        $events = $ministry->Events;

        return view('women', [
            'ministry' => $ministry,
            'events'   => $events,
            'studies'   => $studies
        ]);
    }

}
