<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerPositionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('volunteer_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ministry_id')->nullable();
            $table->integer('skill_id');
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('availability');
            $table->string('commitment');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('volunteer_positions');
    }
}
