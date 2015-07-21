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
            'ident'               => 'beukemas',
            'name'                => 'The Beukemas',
            'mission_location_id' => MissionLocation::where('ident', '=', 'jamaica')->first()->id,
            'url'                 => 'http://bkbeukema.org',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'ident'               => 'coplands',
            'name'                => 'The Coplands',
            'mission_location_id' => MissionLocation::where('ident', '=', 'italy')->first()->id,
            'url'                 => 'http://nickandshannan.org',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'ident'               => 'chris-ladd',
            'name'                => 'Chris Ladd',
            'mission_location_id' => MissionLocation::where('ident', '=', 'south-africa')->first()->id,
            'url'                 => 'http://chrisleeladd.com',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'ident'               => 'julie-rumph',
            'name'                => 'Julie Rumph',
            'mission_location_id' => MissionLocation::where('ident', '=', 'south-africa')->first()->id,
            'url'                 => 'http://julierumph.org',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

    }
}
