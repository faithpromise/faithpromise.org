<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostgresSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $tables = [
            'bible_plan' => 1,
            'calendar_events' => 0,
            'campuses' => 1,
            'ministries' => 1,
            'mission_locations' => 1,
            'mission_trips' => 1,
            'missionaries' => 1,
            'organizations' => 1,
            'post_locations' => 0,
            'posts' => 1,
            'series' => 1,
            'staff' => 1,
            'staff_ministry' => 1,
            'staff_team' => 1,
            'studies' => 1,
            'study_times' => 1,
            'teams' => 1,
            'ticket_requirements' => 1,
            'ticket_tasks' => 1,
            'users' => 1,
            'videos' => 1,
            'volunteer_positions' => 1,
            'volunteer_positions_skills' => 0,
            'volunteer_skills' => 1
        ];

        foreach ($tables as $table => $incrementing) {

            DB::connection('pgsql')->table($table)->truncate();

            $records = DB::connection('mysql')->table($table)->get();
            foreach ($records as $record) {
                $input = (array)$record;
                DB::connection('pgsql')->table($table)->insert($input);
            }

            if ($incrementing) {
                $max_id = max(intval(DB::table($table)->max('id')), 0) + 1;
                DB::connection('pgsql')->select('ALTER SEQUENCE ' . $table . '_id_seq RESTART WITH ' . $max_id);
            }

        }

    }
}
