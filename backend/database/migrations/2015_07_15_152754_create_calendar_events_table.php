<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->integer('id')->primary()->comment('EventU\'s OccurrenceId');
            $table->integer('event_number')->comment('Groups multiple OccurrenceIds of the same event');
            $table->string('title', 255);
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->string('location', 100)->nullable();
            $table->string('address', 50)->nullable();
            $table->string('address2', 50)->nullable();
            $table->string('city', 35)->nullable();
            $table->char('state', 2)->nullable();
            $table->string('zip', 10)->nullable();
            $table->text('description')->nullable();
            $table->string('contact', 50)->nullable();
            $table->string('contact_email', 75)->nullable();
            $table->string('contact_phone', 35)->nullable();
            $table->string('department', 75)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calendar_events');
    }
}
