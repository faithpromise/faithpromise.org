<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddLengthToStudies extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('studies', function (Blueprint $table) {
            $table->tinyInteger('weeks')->unsigned()->nullable()->after('cost');
            $table->smallInteger('session_length')->unsigned()->nullable()->after('weeks');
            $table->dropColumn('length');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('studies', function (Blueprint $table) {
            $table->dropColumn('session_length');
            $table->dropColumn('weeks');
            $table->string('length', 20)->nullable();
        });
    }
}
