<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddCostToStudies extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('studies', function (Blueprint $table) {
            $table->decimal('cost', 6, 2)->unsigned()->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('studies', function (Blueprint $table) {
            $table->dropColumn('cost');
        });
    }
}
