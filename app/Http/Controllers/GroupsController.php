<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseTime;
use App\Ministry;
use Illuminate\Routing\Controller as BaseController;

class GroupsController extends BaseController {

    public function index() {

        $ministry_slug = 'groups';

        return view('groups', [
            'ministry' => Ministry::whereSlug($ministry_slug)->first()
        ]);

    }

    public function courses() {

        $courses = Course::has('coursetimes')->get();

        return view('courses', [
            'courses' => $courses
        ]);
    }

    public function courseDetail($course) {

        $times = CourseTime::with('campus')->where('course_id', '=', $course->id)->get();

        return view('course_detail', [
            'course' => $course,
            'times' => $times
        ]);
    }

    public function leaders() {
        return view('group_leaders');
    }

    public function newLeader() {
        return view('new-leader');
    }

}
