<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sprint_id')->unsigned();
            $table->integer('meeting_type_id')->unsigned();
            $table->string('name');
            $table->dateTime('meeting_time')->nullable();
            $table->string('location')->nullable();
            $table->string('hosting_by')->nullable();
            $table->dateTime('time_keeper')->nullable();
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
        Schema::dropIfExists('meetings');
    }
}
