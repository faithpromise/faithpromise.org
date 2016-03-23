<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ConvertCampusTimesToJson extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('ALTER TABLE campuses ALTER COLUMN times TYPE JSONB USING times::JSONB;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::statement('ALTER TABLE campuses ALTER COLUMN times TYPE TEXT USING times::JSONB;');
    }
}
