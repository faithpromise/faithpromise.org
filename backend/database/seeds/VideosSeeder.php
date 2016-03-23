<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class VideosSeeder extends CsvSeeder
{

    public function __construct() {
        $this->table = 'videos';
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
