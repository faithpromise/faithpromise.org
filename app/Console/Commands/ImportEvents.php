<?php

namespace App\Console\Commands;

use App\CalendarEvent;
use Carbon\Carbon;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class ImportEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports events from EventU';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {



        CalendarEvent::unguard();

        $record = CalendarEvent::where('id', '=', 304394821)->first();

        dd($record);



        $client = new Client();
        $end_point = 'http://api.serviceu.com/rest/events/occurrences?orgKey=b96cd642-acbb-4eb7-95a2-f18c0f01d5b1&format=json';
        $response = $client->get($end_point);

        $data = json_decode($response->getBody(true));


        foreach ($data as $event) {

            $record = CalendarEvent::where('id', '=', $event->OccurrenceId)->withPast()->first();

            dd($record->id);

            $record->{'id'} = $event->OccurrenceId;
            $record->{'event_number'} = $event->EventId;
            $record->{'title'} = $event->Name;
            $record->{'starts_at'} = Carbon::createFromFormat('m/d/Y h:i:s A', $event->ResourceStartTime);
            $record->{'ends_at'} = Carbon::createFromFormat('m/d/Y h:i:s A', $event->ResourceEndTime);
            $record->{'location'} = $event->LocationName;
            $record->{'address'} = $event->LocationAddress;
            $record->{'address2'} = $event->LocationAddress2;
            $record->{'city'} = $event->LocationCity;
            $record->{'state'} = $event->LocationState;
            $record->{'zip'} = $event->LocationZip;
            $record->{'description'} = $event->Description;
            $record->{'contact'} = $event->ContactName;
            $record->{'contact_email'} = $event->ContactEmail;
            $record->{'contact_phone'} = $event->ContactPhone;
            $record->{'department'} = $event->DepartmentName;

            $record->save();
        }

        CalendarEvent::reguard();

        // Purge old events
        CalendarEvent::where('ends_at', '<', Carbon::now()->subMonth(2));
    }
}
