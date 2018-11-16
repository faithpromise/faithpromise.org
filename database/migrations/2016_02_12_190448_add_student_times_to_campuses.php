<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddStudentTimesToCampuses extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('campuses', function (Blueprint $table) {
            $table->text('student_times')->after('times')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('campuses', function (Blueprint $table) {
            $table->dropColumn('student_times');
        });
    }
}
