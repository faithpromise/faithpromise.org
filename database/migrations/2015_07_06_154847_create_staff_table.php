<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campus_id')->unsigned()->nullable();
            $table->string('ident', 50)->unique();
            $table->string('first_name', 35);
            $table->string('last_name', 35);
            $table->string('display_name', 50);
            $table->string('title', 50)->nullable();
            $table->string('email', 75)->nullable();
            $table->string('phone_ext', 10)->nullable();
            $table->string('blog', 75)->nullable();
            $table->string('facebook', 35)->nullable();
            $table->string('twitter', 35)->nullable();
            $table->string('instagram', 35)->nullable();
            $table->text('bio')->nullable();
            $table->integer('sort')->unsigned()->default(99999);
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
        Schema::drop('staff');
    }
}
