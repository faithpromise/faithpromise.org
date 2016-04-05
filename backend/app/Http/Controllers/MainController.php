<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\Post;
use FaithPromise\Shared\Models\Series;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class MainController extends BaseController {

    public function index() {
        $current_time = Carbon::now()->timezone('America/New_York');
        $show_easter_start = Carbon::createFromDate(2016, 3, 5, 'America/New_York');
        $show_easter_end = Carbon::createFromDate(2016, 3, 28, 'America/New_York')->startOfDay();
        $show_easter = $current_time->between($show_easter_start, $show_easter_end);
        $current_series = Series::currentSeries()->first();
        $events = Event::featured()->get()->sortBy('sort');
        $icampus_times = Campus::findBySlug('online')->formatted_times;

        return view('home', [
            'current_series' => $current_series,
            'events'         => $events,
            'icampus_times'  => $icampus_times,
            'show_easter'    => $show_easter
        ]);
    }

    public function defaultPage() {
        $view = Route::getCurrentRoute()->getUri();

        return view($view);
    }

    public function infuse() {
        return view('infuse', [
            'signups' => Post::whereType('infuse_signup')->orderBy('sort')->get()
        ]);
    }

    public function elevate() {
        return view('elevate', [
            'elevate_lessons' => Post::whereType('elevate_lesson')->orderBy('sort')->get()
        ]);
    }

    public function easter() {

        $posts = Post::byLocation('easter-page')->get();

        return view('easter', [
            'posts' => $posts
        ]);
    }

    public function stephen() {

        $ministers = Post::whereType('stephen_minister')->get();

        return view('stephen', [
            'ministers' => $ministers
        ]);
    }

}
