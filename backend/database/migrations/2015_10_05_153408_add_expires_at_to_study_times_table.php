<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpiresAtToStudyTimesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('study_times', function (Blueprint $table) {
            $table->dropColumn('ends_at');
            $table->dateTime('expire_at')->nullable()->after('starts_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('study_times', function (Blueprint $table) {
            $table->date('ends_at')->nullable()->after('starts_at');
            $table->dropColumn('expire_at');
        });
    }
}
