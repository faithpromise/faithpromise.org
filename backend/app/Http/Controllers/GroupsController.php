<?php

namespace App\Http\Controllers;

use App\Models\Alignment;
use App\Models\Series;
use App\Models\Study;
use Carbon\Carbon;
use FaithPromise\Shared\Models\Post;
use FaithPromise\Shared\Models\StudyTime;
use FaithPromise\Shared\Models\Ministry;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class GroupsController extends BaseController {

    public function index() {

        return view('groups', [
            'ministry'    => Ministry::whereSlug('groups')->first(),
            'group_types' => Post::whereType('group_type')->orderBy('sort')->get()
        ]);

    }

    public function studies() {

        $cache_key = 'short_term_groups_view_4';
        $cache_time = App::environment('production') ? 15 : 0;

        // Cache the view because a lot of queries are required
        return Cache::remember($cache_key, $cache_time, function() {
            $studies = Study::has('times')->orderBy('sort')->get();
            return View::make('studies')->with('studies', $studies)->render();
        });
    }

    public function studyDetail($study) {

        $cache_key = 'short_term_group_view_6_' . $study->id;
        $cache_time = App::environment('production') ? 15 : 0;

        // Cache the view because a lot of queries are required
        return Cache::remember($cache_key, $cache_time, function() use ($study) {

            $times = StudyTime::with('campus')->where('study_id', '=', $study->id)->get()->sortBy(function ($studyTime) {
                return $studyTime->campus->name . $studyTime->starts_at->format(Carbon::ISO8601);
            });

            $orderBy = "gender = '" . $study->gender . "' desc, RANDOM()";
            $studies = Study::has('times')->where('id', '<>', $study->id)->orderByRaw($orderBy)->take(3)->get();

            return View::make('study_detail')->with(['study'   => $study, 'times'   => $times, 'studies' => $studies])->render();

        });

    }

    public function startingPoint() {

        $times = StudyTime::with('campus')->where('study_id', '=', 13)->get()->sortBy(function ($studyTime) {
            return $studyTime->campus->name . $studyTime->starts_at->format(Carbon::ISO8601);
        });

        return view('starting-point', [
            'times' => $times
        ]);

    }

    public function leaders() {

        $resources = Post::where('type', '=', 'group_leader_resource')->orderBy('sort', 'asc')->get();

        return view('group_leaders', [
            'resources' => $resources
        ]);
    }

    public function training() {

        $videos = Post::where('type', '=', 'group_leader_video')->orderBy('sort', 'asc')->get();
        $new_leader_videos = Post::where('type', '=', 'new_group_leader_video')->orderBy('sort', 'asc')->get();
        $resources = Post::where('type', '=', 'group_leader_resource')->where('slug', '!=', 'group-leader-training')->orderBy('sort', 'asc')->get();

        return view('group_leader_training', [
            'videos'            => $videos,
            'new_leader_videos' => $new_leader_videos,
            'resources'         => $resources
        ]);
    }

    public function alignments() {

        $alignments = Alignment::with('resources')->orderBy('publish_at', 'desc')->get();

        $resources = Post::where('type', '=', 'group_leader_resource')->where('slug', '!=', 'group-leader-alignments')->orderBy('sort', 'asc')->get();

        return view('group_leader_alignments', [
            'alignments' => $alignments,
            'resources' => $resources
        ]);
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
            'studies'  => $studies
        ]);
    }

    public function search() {
        return view('groups_search');
    }

}
