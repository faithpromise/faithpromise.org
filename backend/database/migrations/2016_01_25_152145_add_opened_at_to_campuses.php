<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddOpenedAtToCampuses extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('campuses', function (Blueprint $table) {
            $table->dateTime('opened_at')->nullable()->after('sort');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('campuses', function (Blueprint $table) {
            $table->dropColumn('opened_at');
        });
    }
}
