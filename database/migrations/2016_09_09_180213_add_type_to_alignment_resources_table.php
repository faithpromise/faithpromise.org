<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddTypeToAlignmentResourcesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('alignment_resources', function (Blueprint $table) {
            $table->integer('alignment_id')->unsigned()->nullable();
            $table->string('type', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('alignment_resources', function (Blueprint $table) {
            $table->dropColumn('alignment_id');
            $table->dropColumn('type');
        });
    }
}
