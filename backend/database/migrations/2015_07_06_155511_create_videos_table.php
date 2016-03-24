<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('series_id')->unsigned()->nullable();
            $table->integer('speaker_id')->unsigned()->nullable();
            $table->string('slug', 100);
            $table->string('type', 20);
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->integer('vimeo_id')->nullable();
            $table->integer('vimeo_id_asl')->nullable();
            $table->string('audio_file', 50)->nullable();
            $table->date('sermon_date')->nullable();
            $table->string('speaker_name', 50)->nullable();
            $table->dateTime('publish_at')->nullable();
            $table->timestamps();

            $table->unique(['series_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos');
    }
}
