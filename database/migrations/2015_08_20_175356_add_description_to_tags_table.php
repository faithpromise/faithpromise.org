<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToTagsTable extends Migration {

    public function up() {
        Schema::table('tagging_tags', function (Blueprint $table) {
            $table->text('description')->after('name');
        });
    }

    public function down() {
        Schema::table('tagging_tags', function(Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
