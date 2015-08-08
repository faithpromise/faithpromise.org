<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MissionLocationsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('mission_locations')->truncate();

        DB::table('mission_locations')->insert([
            'slug'         => 'east-asia',
            'name'         => 'East Asia',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'south-africa',
            'name'         => 'South Africa',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'honduras',
            'name'         => 'Honduras',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'bahamas',
            'name'         => 'Bahamas',
            'is_continual' => 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'haiti',
            'name'         => 'Haiti',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'portugal',
            'name'         => 'Portugal',
            'is_continual' => 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'jamaica',
            'name'         => 'Jamaica',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'new-york-city',
            'name'         => 'New York City',
            'is_continual' => 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'mexico',
            'name'         => 'Mexico',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'costa-rica',
            'name'         => 'Costa Rica',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'big-creek-ky',
            'name'         => 'Big Creek, KY',
            'is_continual' => 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'slug'         => 'italy',
            'name'         => 'Italy',
            'is_continual' => 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

    }
}
