<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddZendeskUserIdToStaff extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('staff', function (Blueprint $table) {
            $table->integer('zendesk_user_id')->unsigned()->nullable()->after('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('zendesk_user_id');
        });
    }
}
