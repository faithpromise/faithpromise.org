<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\Post;
use FaithPromise\Shared\Models\Series;
use FaithPromise\Shared\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class MainController extends BaseController {

    public function index() {

        $current_time = Carbon::now()->timezone('America/New_York');
        $show_easter_end = Carbon::createFromDate(2017, 4, 17, 'America/New_York')->startOfDay();
        $show_easter = $current_time->lt($show_easter_end);

        $current_series = Series::currentSeries()->first();
        $events = Event::featured()->get()->sortBy('sort');
        $icampus_times = Campus::findBySlug('online')->formatted_times;

        return view('home', [
            'current_series' => $current_series,
            'events'         => $events,
            'icampus_times'  => $icampus_times,
            'show_easter'    => $show_easter,
        ]);
    }

    public function defaultPage() {
        $view = Route::getCurrentRoute()->getUri();

        return view($view);
    }

    public function infuse() {
        return view('infuse', [
            'signups' => Post::whereType('infuse_signup')->orderBy('sort')->get(),
        ]);
    }

    public function infuseTraining() {
        return view('infuse-training', [
            'lessons' => Post::whereType('infuse_lesson')->orderBy('sort')->get(),
        ]);
    }

    public function elevate() {
        return view('elevate', [
            'elevate_lessons' => Post::whereType('elevate_lesson')->orderBy('sort')->get(),
        ]);
    }

    public function elevateRss() {
        $content = View::make('elevate-rss');

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }

    public function easter() {

        $posts = Post::byLocation('easter-page')->get();

        return view('easter', [
            'posts' => $posts,
        ]);
    }

    public function christmas() {

        $posts = Post::byLocation('christmas-page')->get();

        return view('christmas', [
            'posts' => $posts,
        ]);
    }

    public function stephen() {

        $ministers = Post::whereType('stephen_minister')->get();

        return view('stephen', [
            'ministers' => $ministers,
        ]);
    }

    public function whatToExpect(Request $request) {

        $view = $request->getHost() == config('site.students_domain') ? 'students/what-to-expect' : 'what-to-expect';

        return view($view);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     * We're attempting to be smart about 404s. Some examples of what we'll
     * try to catch:
     *
     * URL to a page without the dashes
     * /nextsteps -> /next-steps
     *
     * Events, series, staff at the root level - with or without dashes
     * /kylegilbert -> /staff/kyle-gilbert
     * /big-event -> /events/big-event
     *
     */
    public function catchall(Request $request) {

        // Is there a route (page)?
        foreach (Route::getRoutes() as $route) {
            if (strcmp($request->path(), str_replace('-', '', $route->getPath())) === 0) {
                return redirect($route->getPath());
            }
        };

        // Locations
        if ($campus = Campus::where('slug', '=', $request->path())->first())
            return redirect($campus->url);;


        // Events
        $event = Event::whereRaw("replace(slug, '-', '') = '" . $request->path() . "'")->first();
        if ($event) {
            return redirect($event->url);
        }

        $event = Event::where('slug', '=', $request->path())->first();
        if ($event) {
            return redirect($event->url);
        }

        // Series
        $series = \App\Models\Series::whereRaw("replace(slug, '-', '') = '" . $request->path() . "'")->first();
        if ($series) {
            return redirect($series->url);
        }

        $series = \App\Models\Series::where('slug', '=', $request->path())->first();
        if ($series) {
            return redirect($series->url);
        }

        // Staff
        $staff = Staff::whereRaw("replace(slug, '-', '') = '" . $request->path() . "'")->first();
        if ($staff) {
            return redirect($staff->url);
        }

        $staff = Staff::where('slug', '=', $request->path())->first();
        if ($staff) {
            return redirect($staff->url);
        }

        abort(404);

    }

}
