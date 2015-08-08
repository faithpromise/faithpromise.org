<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('teams')->truncate();

        DB::table('teams')->insert([
            'slug'       => 'executive',
            'title'      => 'Executive Team',
            'sort'       => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'slug'       => 'pastors',
            'title'      => 'Campus Pastors',
            'sort'       => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'slug'       => 'fpkids',
            'title'      => 'fpKids',
            'sort'       => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'slug'       => 'fpstudents',
            'title'      => 'fpStudents',
            'sort'       => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'slug'       => 'groups',
            'title'      => 'Groups Ministry',
            'sort'       => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'slug'       => 'worship',
            'title'      => 'Worship Ministry',
            'sort'       => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'slug'       => 'leadership',
            'title'      => 'Leadership Development and Stewardship',
            'sort'       => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'slug'       => 'administration',
            'title'      => 'Administration',
            'sort'       => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
