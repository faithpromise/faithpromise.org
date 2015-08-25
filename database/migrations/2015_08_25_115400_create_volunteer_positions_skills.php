<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerPositionsSkills extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('volunteer_positions_skills', function (Blueprint $table) {
            $table->integer('volunteer_position_id');
            $table->integer('volunteer_skill_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('volunteer_positions_skills');
    }
}
