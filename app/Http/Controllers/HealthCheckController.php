<?php

namespace App\Http\Controllers;

use Cache;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class HealthCheckController extends BaseController {

    public function index() {

        $result = [];

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

    private function has_stale_queue_items() {

        $cache_key = 'healthcheck_stale_queue';
        $cache_timeout = 5;

        if (!Cache::has($cache_key)) {
            $threshold = Carbon::now()->subMinute(5)->timestamp;
            $stale_queue_items = \DB::table('queue_jobs')->where('created_at', '<', $threshold)->get();
            $result = count($stale_queue_items) > 0;
            Cache::put($cache_key, $result, $cache_timeout);
        }

        return Cache::get($cache_key);

    }

    private function calendar_out_of_date() {

        $cache_key = 'healthcheck_calendar_out_of_date';
        $cache_timeout = 12*60;

        if (!Cache::has($cache_key)) {
            $threshold = Carbon::now()->subHours(24)->format('Y-m-d H:i:s');
            $items = \DB::table('calendar_events')->where('updated_at', '>', $threshold)->limit(1)->get();
            $result = count($items) === 0;
            Cache::put($cache_key, $result, $cache_timeout);
        }

        return Cache::get($cache_key);
    }

}