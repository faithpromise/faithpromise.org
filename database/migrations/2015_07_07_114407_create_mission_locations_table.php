<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ident', 35)->unique();
            $table->string('name', 35);
            $table->integer('sort')->unsigned()->default(99999);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mission_locations');
    }
}
