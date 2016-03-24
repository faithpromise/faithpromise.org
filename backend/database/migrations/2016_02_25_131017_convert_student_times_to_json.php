<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ConvertStudentTimesToJson extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('ALTER TABLE campuses ALTER COLUMN student_times TYPE JSONB USING times::JSONB;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::statement('ALTER TABLE campuses ALTER COLUMN student_times TYPE TEXT USING times::JSONB;');
    }
}
