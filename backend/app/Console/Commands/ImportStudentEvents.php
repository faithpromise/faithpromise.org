<?php

namespace App\Console\Commands;

use FaithPromise\Shared\Models\Event;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class ImportStudentEvents extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:import-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports student events from new Faith Promise website';

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

        $client = new Client();
        $end_point = 'faithpromise.org/api/student-events';
//        $end_point = 'http://craft2.faithpromise.192.168.10.10.xip.io/api/student-events';
        $response = $client->get($end_point);
        $content = json_decode($response->getBody(true));
        $data = $content->data;

        Event::unguard();

        foreach ($data as $event) {

            if ($event->image_tall) {
//                $file_path = '/home/vagrant/assets.faithpromise.org/assets/images/events/' . $event->slug . '-tall.jpg';
                $file_path = '/home/forge/faithpromise.org/storage/assets/images/events/' . $event->slug . '-tall.jpg';
                file_put_contents($file_path, file_get_contents($event->image_tall));
            }

            if ($event->image_wide) {
//                $file_path = '/home/vagrant/assets.faithpromise.org/assets/images/events/' . $event->slug . '-tall.jpg';
                $file_path = '/home/forge/faithpromise.org/storage/assets/images/events/' . $event->slug . '-wide.jpg';
                file_put_contents($file_path, file_get_contents($event->image_wide));
            }

            $record = Event::withoutGlobalScopes()->where('slug', '=', $event->slug)->first() ?: new Event;

            $record->{'type'} = 'event';
            $record->{'site'} = 'fpstudents';
            $record->{'ministry_id'} = 9;
            $record->{'slug'} = $event->slug;
            $record->{'title'} = $event->title;
            $record->{'subtitle'} = $event->subtitle;
            $record->{'excerpt'} = $event->excerpt;
            $record->{'description'} = $event->description;
            $record->{'url'} = $event->url;
            $record->{'publish_at'} = $event->publish_at;
            $record->{'expire_at'} = $event->expire_at;
            $record->{'sort'} = $event->sort;
            $record->{'image'} = null;

            $record->save();
        }

    }
}
