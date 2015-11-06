<?php
/**
 * Created by PhpStorm.
 * User: broberts
 * Date: 7/7/15
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\CalendarEvent;
use FaithPromise\Shared\Models\Event;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class EventsController extends BaseController {

    public function index() {
        $events = Event::orderBy('sort')->get();

        return view('events', [
            'events' => $events
        ]);
    }

    public function event($event) {

        // If a the event has a (hard coded) URL, redirect to it
        if (strlen($event->original_url)) {
            return redirect($event->original_url);
        }

        if (is_null($event)) {
            // LATER: Serve up another view that suggests events
            abort(404);
        }

        $events = Event::orderBy('sort', 'asc')->take(3)->get();

        return view('event_detail', [
            'event'  => $event,
            'events' => $events
        ]);


    }

    public function calendar() {

        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        return $this->calendarMonth($year, $month);
    }

    public function calendarMonth($year, $month) {

        $current_month = Carbon::now()->firstOfMonth();

        $beginning_of_month = Carbon::create($year, $month, 1)->firstOfMonth();
        $end_of_month = $beginning_of_month->copy()->endOfMonth();

        $prev_month = $beginning_of_month->copy()->subMonth(1);
        $next_month = $beginning_of_month->copy()->addMonth(1);

        $next_monthHasEvents = CalendarEvent::monthHasEvents($next_month->year, $next_month->month);

        $days = CalendarEvent::withinRange($beginning_of_month, $end_of_month)
            ->where('title', '<>', 'Worship Service')
            ->get()
            ->groupBy(function ($event) {
                return $event->starts_at->format('Y-m-d');
            });

        if ($days->count() === 0 && $current_month->eq($beginning_of_month)) {
            $redirect_to_month = $beginning_of_month->addMonth(1);

            return redirect()->route('calendarMonth', ['year' => $redirect_to_month->year, 'month' => $redirect_to_month->month]);
        }

        return view('events_calendar', [
            'start'      => $beginning_of_month,
            'days'       => $days,
            'prev_url'   => '/events/calendar/' . $prev_month->year . '/' . $prev_month->month,
            'next_url'   => '/events/calendar/' . $next_month->year . '/' . $next_month->month,
            'allow_prev' => $beginning_of_month->gt(Carbon::now()->firstOfMonth()),
            'allow_next' => $next_monthHasEvents
        ]);
    }

}