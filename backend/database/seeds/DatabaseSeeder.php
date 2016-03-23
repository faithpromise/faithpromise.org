<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('BiblePlanSeeder');
        $this->call('CampusesSeeder');
        $this->call('MinistriesSeeder');
        $this->call('EventsSeeder');
        $this->call('MissionLocationsSeeder');
        $this->call('MissionTripsSeeder');
        $this->call('SeriesSeeder');
        $this->call('VideosSeeder');
        $this->call('TeamsSeeder');
        $this->call('StaffSeeder');
        $this->call('MissionariesSeeder');

        Model::reguard();
    }
}
