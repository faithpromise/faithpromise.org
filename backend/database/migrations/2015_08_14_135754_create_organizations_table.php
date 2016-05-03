<?php

use Illuminate\Database\Migrations\Migration;
use ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint;

class CreateOrganizationsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 30);
            $table->string('slug', 100);
            $table->string('name', 100);
            $table->string('image', 35)->nullable();
            $table->string('location', 50)->nullable();
            $table->string('excerpt', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('contact', 50)->nullable();
            $table->passthru('citext', 'email')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('website', 75)->nullable();
            $table->string('more_info', 255)->nullable();
            $table->tinyInteger('sort')->unsigned()->default(255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('organizations');
    }
}
