<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTicketTasksTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ticket_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zendesk_ticket_id')->unsigned();
            $table->string('title', 50);
            $table->dateTime('due_at');
            $table->dateTime('completed_at')->nullable();
            $table->integer('completed_by')->unsigned()->nullable();
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
        Schema::drop('ticket_tasks');
    }
}
