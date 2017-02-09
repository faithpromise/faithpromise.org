<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Job;
use FaithPromise\Shared\Models\Ministry;
use FaithPromise\Shared\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller as BaseController;

class MinistriesController extends BaseController {

    public function index($ministry_slug) {
        return view($ministry_slug);
    }

    public function fpKids() {

        $ministry = Ministry::whereSlug('fpkids')->first();

        // Only relevant to fpkids page - don't want to appear on events page
        $events = Post::whereType('fpkids-news')->get()->merge($ministry->events);

        return view('fpkids', [
            'events'   => $events,
            'ministry' => Ministry::whereSlug('fpkids')->first()
        ]);

    }

    public function fpKidsWelcome() {
        return view('fpkids-welcome');
    }

    public function fpKidsCamp() {
        return view('fpkids-camp');
    }

    public function fpKidsWorship() {
        return view('fpkids-worship');
    }

    public function family() {
        return view('family', [
            'what_to_expect_cards' => Post::byLocation('family_ministry_for_kids')->get()
        ]);
    }

    public function fusion() {
        return view('fpstudents-fusion');
    }

    public function creative() {

        $jobs = Job::withPrivate()->whereDepartment('Creative')->get();

        return view('creative', [
            'jobs' => $jobs
        ]);
    }

    public function defaultMinistryPage() {

        $ministry_slug = Route::getCurrentRoute()->getUri();

        return view($ministry_slug, [
            'ministry' => Ministry::whereSlug($ministry_slug)->first()
        ]);

    }

}