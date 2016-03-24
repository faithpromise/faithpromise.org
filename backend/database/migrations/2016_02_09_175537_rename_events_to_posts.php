<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RenameEventsToPosts extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::rename('events', 'posts');
        DB::select('ALTER SEQUENCE events_id_seq RENAME TO posts_id_seq');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::select('ALTER SEQUENCE posts_id_seq RENAME TO events_id_seq');
        Schema::rename('posts', 'events');
    }
}
