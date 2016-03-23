<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHasChildcareToStudyTimes extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('study_times', function (Blueprint $table) {
            $table->boolean('has_childcare')->default(false)->after('room');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('study_times', function (Blueprint $table) {
            $table->dropColumn('has_childcare');
        });
    }
}
