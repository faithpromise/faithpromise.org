<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\EasterService;
use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\Post;
use FaithPromise\Shared\Models\Series;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;

class MainController extends BaseController {

    public function index() {

        $show_easter_on = Carbon::create(2016, 3, 5);
        $show_easter = Carbon::today()->gte($show_easter_on);
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

        $service_days = EasterService::all()
            ->sortBy(function ($service) {
                return $service->service_day->toDateString() . $service->campus->sort;
            })
            ->groupBy(function ($service) {
                return $service->service_day->toDateString();
            });

        return view('easter', [
            'service_days' => $service_days
        ]);
    }

}
