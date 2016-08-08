<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddSoundcloudFieldsToVideos extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('videos', function (Blueprint $table) {
            $table->bigInteger('soundcloud_track_id')->unsigned()->nullable();
            $table->string('soundcloud_track_permalink', 300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('soundcloud_track_id');
            $table->dropColumn('soundcloud_track_permalink');
        });
    }
}
