<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->string('slug', 50);
            $table->string('title', 50);
            $table->string('department', 50)->nullable();
            $table->text('excerpt');
            $table->text('description');
            $table->dateTime('publish_at')->nullable();
            $table->dateTime('expire_at');
            $table->dateTime('public_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('jobs');
    }
}
