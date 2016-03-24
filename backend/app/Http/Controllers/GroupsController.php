<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use FaithPromise\Shared\Models\Post;
use FaithPromise\Shared\Models\Study;
use FaithPromise\Shared\Models\StudyTime;
use FaithPromise\Shared\Models\Ministry;
use Illuminate\Routing\Controller as BaseController;

class GroupsController extends BaseController {

    public function index() {

        return view('groups', [
            'ministry' => Ministry::whereSlug('groups')->first(),
            'group_types' => Post::whereType('group_type')->orderBy('sort')->get()
        ]);

    }

    public function studies() {

        $studies = Study::has('times')->orderBy('sort')->get();

        return view('studies', [
            'studies' => $studies
        ]);
    }

    public function studyDetail($study) {

        $times = StudyTime::with('campus')->where('study_id', '=', $study->id)->get()->sortBy(function($studyTime) {
            return $studyTime->campus->name . $studyTime->starts_at->format(Carbon::ISO8601);
        });

        $orderBy = "gender = '" . $study->gender . "' desc, RANDOM()";
        $studies = Study::has('times')->where('id', '<>', $study->id)->orderByRaw($orderBy)->take(3)->get();

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
        $studies = Study::has('times')->where('gender', '=', 'm')->get();
        $events = $ministry->Events->merge($studies);

        return view('men', [
            'ministry' => $ministry,
            'events'   => $events
        ]);
    }

    public function women() {

        $ministry = Ministry::whereSlug('women')->first();
        $studies = Study::has('times')->where('gender', '=', 'f')->get();
        $events = $ministry->Events;

        return view('women', [
            'ministry' => $ministry,
            'events'   => $events,
            'studies'   => $studies
        ]);
    }

    public function search() {
        return view('groups_search');
    }

}
