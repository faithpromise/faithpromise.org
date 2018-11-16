<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyTimesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('study_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('study_id');
            $table->integer('campus_id');
            $table->datetime('starts_at');
            $table->date('ends_at')->nullable();
            $table->string('room', 20)->nullable();
            $table->string('registration_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('study_times');
    }
}
