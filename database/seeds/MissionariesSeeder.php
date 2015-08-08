<?php

use App\MissionLocation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MissionariesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('missionaries')->truncate();

        DB::table('missionaries')->insert([
            'slug'                => 'beukemas',
            'name'                => 'The Beukemas',
            'mission_location_id' => MissionLocation::where('slug', '=', 'jamaica')->first()->id,
            'url'                 => 'http://bkbeukema.org',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'slug'                => 'coplands',
            'name'                => 'The Coplands',
            'mission_location_id' => MissionLocation::where('slug', '=', 'italy')->first()->id,
            'url'                 => 'http://nickandshannan.org',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'slug'                => 'chris-ladd',
            'name'                => 'Chris Ladd',
            'mission_location_id' => MissionLocation::where('slug', '=', 'south-africa')->first()->id,
            'url'                 => 'http://chrisleeladd.com',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'slug'                => 'julie-rumph',
            'name'                => 'Julie Rumph',
            'mission_location_id' => MissionLocation::where('slug', '=', 'south-africa')->first()->id,
            'url'                 => 'http://julierumph.org',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

    }
}
