<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class HealthCheckController extends BaseController {

    public function index() {

        $result = [];

        if ($this->has_failed_queue_items()) {
            $result[] = 'Failed queue items';
        }

        if ($this->has_stale_queue_items()) {
            $result[] = 'Stale queue items';
        }

        if ($this->calendar_out_of_date()) {
            $result[] = 'Calendar not up-to-date. EventU importer may not be working.';
        }

        if (empty($result)) {
            $result[] = 'Success! All tests passed successfully.';
        }

        return implode($result, '<br>');
    }

    private function has_failed_queue_items() {
        return DB::table('queue_failed_jobs')->count() > 0;
    }

    private function has_stale_queue_items() {
        $threshold = Carbon::now()->subMinute(5)->timestamp;
        return DB::table('queue_jobs')->where('created_at', '<', $threshold)->count() > 0;
    }

    private function calendar_out_of_date() {
        $threshold = Carbon::now()->subHours(60)->format('Y-m-d H:i:s');
        return DB::table('calendar_events')->where('updated_at', '>', $threshold)->count() === 0;
    }

}