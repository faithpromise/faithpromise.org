<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mission_trips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('missionlocation_id')->unsigned()->nullable();
            $table->string('title', 50);
            $table->string('dates', 50)->nullable();
            $table->string('cost', 100)->nullable();
            $table->string('seats', 10)->nullable();
            $table->text('description')->nullable();
            $table->text('contact')->nullable();
            $table->text('contact_email')->nullable();
            $table->boolean('is_full')->default(0);
            $table->tinyInteger('sort')->unsigned()->default(255);
            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();
            $table->dateTime('expire_at')->nullable();
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
        Schema::drop('mission_trips');
    }
}
