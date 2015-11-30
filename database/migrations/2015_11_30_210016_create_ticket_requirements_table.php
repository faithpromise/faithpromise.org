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
            $table->integer('zendesk_ticket_id')->unsigned();
            $table->string('title', 250);
            $table->text('body');
            $table->dateTime('due_at');
            $table->integer('created_by')->unsigned()->nullable();
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
