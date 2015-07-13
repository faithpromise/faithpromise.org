<?php

use Illuminate\Database\Seeder;

class MissionLocationsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('mission_locations')->truncate();

        DB::table('mission_locations')->insert([
            'ident'        => 'east-asia',
            'name'         => 'East Asia',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'south-africa',
            'name'         => 'South Africa',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'honduras',
            'name'         => 'Honduras',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'bahamas',
            'name'         => 'Bahamas',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'haiti',
            'name'         => 'Haiti',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'portugal',
            'name'         => 'Portugal',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'jamaica',
            'name'         => 'Jamaica',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'new-york-city',
            'name'         => 'New York City',
            'is_continual' => 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'mexico',
            'name'         => 'Mexico',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'costa-rica',
            'name'         => 'Costa Rica',
            'is_continual' => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'big-creek-ky',
            'name'         => 'Big Creek, KY',
            'is_continual' => 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('mission_locations')->insert([
            'ident'        => 'italy',
            'name'         => 'Italy',
            'is_continual' => 0,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

    }
}
