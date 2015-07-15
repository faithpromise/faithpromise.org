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

        $beginningOfMonth = Carbon::create($year, $month, 1);
        $endOfMonth = $beginningOfMonth->copy()->endOfMonth();

        // TODO: Remove withPast after figuring out how to make it work
        $days = CalendarEvent::withPast()
            ->where('starts_at', '>', $beginningOfMonth)
            ->where('ends_at', '<', $endOfMonth)
            ->orderBy('starts_at')
            ->get()
            ->groupBy(function ($event) {
                return $event->starts_at->format('Y-m-d');
            });

        return view('events_calendar', [
            'start' => $beginningOfMonth,
            'end'   => $endOfMonth,
            'days'  => $days
        ]);
    }

}