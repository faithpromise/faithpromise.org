<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiblePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bible_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('day')->unsigned();
            $table->string('passage', 35);
            $table->text('passage_text');
            $table->tinyInteger('sort')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bible_plan');
    }
}
