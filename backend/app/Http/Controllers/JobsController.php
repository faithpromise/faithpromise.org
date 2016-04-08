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

    public function detail($job_id) {

        $job = Job::findBySlug($job_id);

        return view('jobs_detail', [
            'job' => $job
        ]);
    }

}
