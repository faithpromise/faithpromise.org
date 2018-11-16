<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddLeaderToStudyTimes extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('study_times', function (Blueprint $table) {
            $table->string('leader', 30)->nullable()->after('expire_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('study_times', function (Blueprint $table) {
            $table->dropColumn('leader');
        });
    }
}
