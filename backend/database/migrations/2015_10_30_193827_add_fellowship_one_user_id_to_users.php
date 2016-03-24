<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFellowshipOneUserIdToUsers extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('fellowship_one_user_id')->unsigned()->nullable()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fellowship_one_user_id');
        });
    }
}
