<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\ImportEvents::class,
        Commands\ToggleStaffHasImage::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {

        $schedule->command('backup:run')->dailyAt('4:00')->thenPing(config('site.heartbeat_backup'));

        $schedule->command('events:import')->hourly()->thenPing(config('site.heartbeat_events_updated'));

        $schedule->command('staff:toggle-has-image')->weekdays()->everyThirtyMinutes()->when(function () {
            $now = Carbon::now();

            return $now->hour >= 8 && $now->hour <= 18;
        });
    }
}
