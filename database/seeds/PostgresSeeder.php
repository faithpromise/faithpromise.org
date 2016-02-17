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
            'bible_plan',
            'calendar_events',
            'campuses',
            'ministries',
            'mission_locations',
            'mission_trips',
            'missionaries',
            'organizations',
            'post_locations',
            'posts',
            'series',
            'staff',
            'staff_ministry',
            'staff_team',
            'studies',
            'study_times',
            'teams',
            'ticket_requirements',
            'ticket_tasks',
            'users',
            'videos',
            'volunteer_positions',
            'volunteer_positions_skills',
            'volunteer_skills'];

        foreach ($tables as $table) {

            DB::connection('pgsql')->table($table)->truncate();

            $records = DB::connection('mysql')->table($table)->get();
            foreach ($records as $record) {
                $input = (array)$record;
                if (array_key_exists('id', $input) && !in_array($table, ['calendar_events'])) {
                    unset($input['id']);
                }
                DB::connection('pgsql')->table($table)->insert($input);
            }

        }

    }
}
