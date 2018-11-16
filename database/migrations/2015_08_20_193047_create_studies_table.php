<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 50)->unique();
            $table->string('name', 50);
            $table->string('excerpt', 255)->nullable();
            $table->text('description')->nullable();
            $table->char('gender', 1)->nullable();
            $table->string('image', 50)->nullable();
            $table->tinyInteger('sort')->unsigned()->default(255);
            $table->string('cost', 30)->nullable();
            $table->tinyInteger('weeks')->nullable();
            $table->decimal('session_length', 2, 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('studies');
    }
}
