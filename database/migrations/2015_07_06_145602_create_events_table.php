<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ministry_id')->nullable();
            $table->integer('calendar_event_number')->nullable();
            $table->string('slug', 50);
            $table->string('title', 50);
            $table->string('dates_text', 35)->nullable();
            $table->string('image', 255)->nullable();
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured');
            $table->string('url', 255)->nullable();
            $table->dateTime('publish_at')->nullable();
            $table->dateTime('expire_at')->nullable();
            $table->tinyInteger('sort')->unsigned();
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
        Schema::drop('events');
    }
}
