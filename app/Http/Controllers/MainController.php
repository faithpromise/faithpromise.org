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

    public function elevate() {
        return view('elevate', [
            'elevate_lessons' => Post::whereType('elevate_lesson')->orderBy('sort')->get()
        ]);
    }

    public function easter() {
        return view('easter');
    }

    public function easterTimes() {

        $days = [];
        $today = Carbon::today();
        $selected = 0;
        $counter = 0;

        $service_days = EasterService::all()
            ->sortBy(function ($service) {
                return $service->service_day->toDateString() . $service->campus->sort;
            })
            ->groupBy(function ($service) {
                return $service->service_day->toDateString();
            });

        foreach ($service_days as $key => $day) {

            $d = Carbon::parse($key);
            $services = [];

            if ($today->isSameDay($d)) {
                $selected = $counter;
            }

            $counter++;

            foreach ($day as $service) {
                $services[] = (object)[
                    'campus_name'      => $service->campus->name,
                    'campus_full_name' => $service->campus->full_name,
                    'campus_image'     => resized_image_url($service->campus->image, 800, 'tall'),
                    'campus_url'       => $service->campus->url,
                    'times'            => '<span class="no-wrap">' . implode('</span>, <span class="no-wrap">', $service->service_times) . '</span>'
                ];
            }

            $days[] = (object)[
                'timestamp'   => $d->timestamp,
                'day_of_week' => $d->format('l'),
                'month'       => $d->format('n'),
                'month_name'  => $d->format('F'),
                'day'         => $d->format('j'),
                'services'    => $services
            ];
        }

        return [
            'days'     => $days,
            'selected' => $selected
        ];
    }

}
