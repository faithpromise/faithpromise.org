<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerPositionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('volunteer_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ministry_id')->nullable();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('availability')->nullable();
            $table->string('commitment')->nullable();
            $table->datetime('publish_at')->nullable();
            $table->datetime('expire_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('volunteer_positions');
    }
}
