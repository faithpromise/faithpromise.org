<?php
/**
 * Created by PhpStorm.
 * User: broberts
 * Date: 7/7/15
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;

use App\CalendarEvent;
use App\Event;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class EventsController extends BaseController
{

    public function index()
    {
        $events = Event::all();

        return view('events', [
            'events' => $events
        ]);
    }

    public function calendar()
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        return $this->calendarMonth($year, $month);
    }

    public function calendarMonth($year, $month)
    {

        $beginningOfMonth = Carbon::create($year, $month, 1)->firstOfMonth();
        $endOfMonth = $beginningOfMonth->copy()->endOfMonth();

        $prevMonth = $beginningOfMonth->copy()->subMonth(1);
        $nextMonth = $beginningOfMonth->copy()->addMonth(1);

        $nextMonthHasEvents = CalendarEvent::monthHasEvents($nextMonth->year, $nextMonth->month);

        $days = CalendarEvent::withinRange($beginningOfMonth, $endOfMonth)
            ->where('title', '<>', 'Worship Service')
            ->get()
            ->groupBy(function ($event) {
                return $event->starts_at->format('Y-m-d');
            });

        return view('events_calendar', [
            'start'      => $beginningOfMonth,
            'days'       => $days,
            'prev_url'   => '/events/calendar/' . $prevMonth->year . '/' . $prevMonth->month,
            'next_url'   => '/events/calendar/' . $nextMonth->year . '/' . $nextMonth->month,
            'allow_prev' => $beginningOfMonth->gt(Carbon::now()->firstOfMonth()),
            'allow_next' => $nextMonthHasEvents
        ]);
    }

}