<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsFullToStudyTimesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('study_times', function (Blueprint $table) {
            $table->boolean('is_full')->default(false)->after('registration_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('study_times', function (Blueprint $table) {
            $table->dropColumn('is_full');
        });
    }
}
