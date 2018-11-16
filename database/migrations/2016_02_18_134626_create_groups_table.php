<?php

use Illuminate\Database\Migrations\Migration;
use Phaza\LaravelPostgis\Schema\Blueprint;
//use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('groups', function (Blueprint $table) {
            $table->integer('id')->unsigned()->primary()->comment('Fellowship One\'s ID');
            $table->string('name', 200);
            $table->jsonb('leaders')->nullable();
            $table->string('photo', 200)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('average_age')->unsigned()->nullable();
            $table->tinyInteger('kids_min_age')->unsigned()->nullable();
            $table->tinyInteger('kids_max_age')->unsigned()->nullable();
            $table->boolean('kids_welcome')->default(false);
            $table->string('recurrence_rule', 100)->nullable();
            $table->point('location')->nullable();
            $table->boolean('is_location_public')->default(false);
            $table->string('address', 50)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('state', 2)->nullable();
            $table->string('zip', 5)->nullable();
            $table->timestamp('detail_last_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('groups');
    }
}
