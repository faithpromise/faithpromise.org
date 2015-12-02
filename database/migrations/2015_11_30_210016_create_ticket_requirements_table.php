<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTicketRequirementsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ticket_requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('zendesk_ticket_id')->unsigned();
            $table->string('title', 250);
            $table->text('body')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->tinyInteger('sort')->unsigned()->default(99);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('ticket_requirements');
    }
}
