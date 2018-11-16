<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\Job;
use Illuminate\Routing\Controller as BaseController;

class JobsController extends BaseController {

    public function index() {

        $jobs = Job::all();

        return view('jobs', [
            'jobs' => $jobs
        ]);
    }

    public function detail($job_slug) {

        $job = Job::withPrivate()->with('contact')->whereSlug($job_slug)->first();
        $other_jobs_available = Job::count() > 0;

        return view('jobs_detail', [
            'job' => $job,
            'other_jobs_available' => $other_jobs_available
        ]);
    }

}
