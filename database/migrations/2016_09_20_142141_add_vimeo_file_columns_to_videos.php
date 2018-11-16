<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddVimeoFileColumnsToVideos extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('videos', function (Blueprint $table) {
            $table->string('vimeo_file_hd', 200)->nullable();
            $table->string('vimeo_file_stream', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('vimeo_file_hd');
            $table->dropColumn('vimeo_file_stream');
        });
    }
}
