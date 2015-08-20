<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTimesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('course_times', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('campus_id');
            $table->date('starts_at');
            $table->date('ends_at')->nullable();
            $table->time('meeting_time')->nullable();
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
        Schema::drop('course_times');
    }
}
