<?php

namespace App\Http\Controllers\Students;

use FaithPromise\Shared\Models\Event;
use Illuminate\Routing\Controller as BaseController;

class UpdatesController extends BaseController {

    public function index() {
        return view('students/updates', [
            'posts' => Event::orderBy('sort')->get()
        ]);
    }

    public function detail($post) {

        // If the post has a (hard coded) URL, redirect to it
        if (strlen($post->original_url)) {
            return redirect($post->original_url);
        }

        if (is_null($post)) {
            // LATER: Serve up another view that suggests events
            abort(404);
        }

        $posts = Event::orderBy('sort', 'asc')->take(3)->get();

        return view('students/update', [
            'post'  => $post,
            'posts' => $posts
        ]);

    }

}