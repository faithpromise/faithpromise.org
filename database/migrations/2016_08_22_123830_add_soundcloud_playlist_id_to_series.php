<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddSoundcloudPlaylistIdToSeries extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('series', function (Blueprint $table) {
            $table->bigInteger('soundcloud_playlist_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('series', function (Blueprint $table) {
            $table->removeColumn('soundcloud_playlist_id');
        });
    }
}
