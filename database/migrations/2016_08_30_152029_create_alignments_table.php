<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAlignmentsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('alignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 100)->unique();
            $table->integer('series_id')->unsigned()->nullable();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->dateTime('publish_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('alignments');
    }

}
