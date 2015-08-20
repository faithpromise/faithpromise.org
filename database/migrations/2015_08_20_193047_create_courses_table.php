<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 50)->unique();
            $table->string('name', 50);
            $table->string('excerpt', 255)->nullable();
            $table->text('description')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('image', 50)->nullable();
            $table->string('length', 20)->nullable();
            $table->tinyInteger('sort')->unsigned()->default(255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('courses');
    }
}
