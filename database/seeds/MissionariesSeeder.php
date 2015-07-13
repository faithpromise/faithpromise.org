<?php

use App\MissionLocation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MissionariesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('missionaries')->truncate();

        DB::table('missionaries')->insert([
            'name'                => 'The Beukemas',
            'mission_location_id' => MissionLocation::where('ident', '=', 'jamaica')->first()->id,
            'url'                 => 'http://bkbeukema.org',
            'image'               => 'beukemas.jpg',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'name'                => 'The Coplands',
            'mission_location_id' => MissionLocation::where('ident', '=', 'italy')->first()->id,
            'url'                 => 'http://nickandshannan.org',
            'image'               => 'coplands.jpg',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'name'                => 'Chris Ladd',
            'mission_location_id' => MissionLocation::where('ident', '=', 'south-africa')->first()->id,
            'url'                 => 'http://chrisleeladd.com',
            'image'               => 'chris-ladd.jpg',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('missionaries')->insert([
            'name'                => 'Julie Rumph',
            'mission_location_id' => MissionLocation::where('ident', '=', 'south-africa')->first()->id,
            'url'                 => 'http://julierumph.org',
            'image'               => 'julie-rumph.jpg',
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

    }
}
