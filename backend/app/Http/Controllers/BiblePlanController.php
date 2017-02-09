<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\BiblePlan;
use App\FaithPromise\BibleApi;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class BiblePlanController extends BaseController {

    public function index() {
        $today = Carbon::now()->startOfDay();
        return $this->day($today->format('F'), $today->day);
    }

    public function day($month, $day) {

        $date_str = date('Y') . '/' . $month . '/' . $day;
        $selected_date = Carbon::createFromFormat('Y/F/j', $date_str)->startOfDay();
        $day_of_year = $selected_date->dayOfYear + 1; // Zero based
        $calendar_data = $this->getCalendarData($selected_date->month);
        $passages = BiblePlan::where('day', '=', $day_of_year)->orderBy('sort')->get();

        BibleApi::loadPassages($passages);

        return view('bible_plan', [
            'passages'      => $passages,
            'selected_date' => $selected_date,
            'calendar_data' => $calendar_data
        ]);

    }

    private function getCalendarData($month) {

        $data = [
            'days_of_week' => ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'],
            'months'       => [],
            'weeks'        => [],
        ];
        $month = Carbon::create(null, $month, 1);
        $start_of_year = $month->copy()->startOfYear();

        $data['next_month'] = $month->copy()->addMonth(1);
        $data['previous_month'] = $month->copy()->subMonth(1);

        for ($i = 0; $i < 12; ++$i) {
            array_push($data['months'], $start_of_year->copy()->addMonth($i));
        }

        $week_start = $month->copy()->previous(Carbon::SUNDAY);
        $last_day_of_calendar = $month->copy()->endOfMonth()->next(Carbon::SATURDAY);

        while ($week_start->lt($last_day_of_calendar)) {

            $days = [];

            for ($i = 0; $i < 7; ++$i) {
                array_push($days, $week_start->copy()->addDay($i));
            }

            array_push($data['weeks'], $days);

            $week_start->addDays(7);
        }

        return $data;
    }

}