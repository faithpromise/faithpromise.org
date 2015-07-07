<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class CampusesSeeder extends CsvSeeder
{

    public function __construct() {
        $this->table = 'campuses';
        $this->filename = base_path() . '/database/seeds/csv/' . $this->table . '.csv';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();

        DB::table($this->table)->truncate();

        parent::run();
    }
}
