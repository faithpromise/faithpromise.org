<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAlignmentResourcesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('alignment_resources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 50);
            $table->integer('series_id')->unsigned();
            $table->string('title', 100);
            $table->string('image', 100)->nullable();
            $table->string('url', 200);
            $table->integer('sort')->unsigned()->default(9999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('alignment_resources');
    }
}
