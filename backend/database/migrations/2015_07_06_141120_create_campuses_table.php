<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 50)->unique();
            $table->string('name', 50);
            $table->string('location', 35);
            $table->string('address', 50)->nullable();
            $table->string('city', 35)->nullable();
            $table->char('state', 2)->nullable();
            $table->char('zip', 5)->nullable();
            $table->decimal('lat', 7, 5)->unsigned()->nullable();
            $table->decimal('lng', 8, 5)->nullable();
            $table->text('times');
            $table->string('map_url', 255)->nullable();
            $table->string('directions_url', 255)->nullable();
            $table->tinyInteger('sort');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campuses');
    }
}
