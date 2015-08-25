<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTagGroupToTagsTable extends Migration {

    public function up() {
        Schema::table('tagging_tags', function (Blueprint $table) {
            $table->integer('tag_group_id')->after('id');
        });
    }

    public function down() {
        Schema::table('tagging_tags', function(Blueprint $table) {
            $table->dropColumn('tag_group_id');
        });
    }
}
