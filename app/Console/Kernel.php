<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
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
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('events:import')->hourly()->thenPing(env('HEARTBEAT_EVENTS_UPDATED', 'http://127.0.0.1'));

        $schedule->command('staff:toggle-has-image')->weekdays()->everyThirtyMinutes()->when(function() {
            $now = Carbon::now();
            return $now->hour >= 8 && $now->hour <= 18;
        });
    }
}
