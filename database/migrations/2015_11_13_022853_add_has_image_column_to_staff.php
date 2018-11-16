<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHasImageColumnToStaff extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('staff', function (Blueprint $table) {
            $table->boolean('has_image')->default(false)->after('instagram');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('has_image');
        });
    }
}
