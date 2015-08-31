<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropHasChildcareOnStudies extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('studies', function (Blueprint $table) {
            $table->dropColumn('has_childcare');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('studies', function (Blueprint $table) {
            $table->boolean('has_childcare')->default(false)->after('image');
        });
    }
}
