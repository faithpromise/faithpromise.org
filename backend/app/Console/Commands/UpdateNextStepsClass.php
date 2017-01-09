<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use FaithPromise\Shared\Models\Event;
use Illuminate\Console\Command;

class UpdateNextStepsClass extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:update-next-steps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Next Steps Class Date';

    /**
     * Create a new command instance.
     *
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $second_sunday = new Carbon('second sunday of this month');
        if ($second_sunday->endOfDay()->isPast()) {
            $second_sunday = new Carbon('second sunday of next month');
        }

        // siteAgnostic - Middleware isn't fired so config isn't merged. So, config('site.ident') will return NULL at this point.
        $event = Event::siteAgnostic()->where('slug', '=', 'next-steps-class')->first();

        $event->subtitle = $second_sunday->format('l F j');
        $event->save();

    }
}
