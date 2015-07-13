<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('teams')->truncate();

        DB::table('teams')->insert([
            'ident'       => 'executive',
            'title'       => 'Executive Team',
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'ident'       => 'pastors',
            'title'       => 'Campus Pastors',
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'ident'       => 'fpkids',
            'title'       => 'fpKids',
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'ident'       => 'fpstudents',
            'title'       => 'fpStudents',
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'ident'       => 'groups',
            'title'       => 'Groups Ministry',
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'ident'       => 'worship',
            'title'       => 'Worship Ministry',
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'ident'       => 'leadership',
            'title'       => 'Leadership Development and Stewardship',
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('teams')->insert([
            'ident'       => 'administration',
            'title'       => 'Administration',
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
    }
}
