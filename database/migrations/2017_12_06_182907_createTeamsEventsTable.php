<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsEventsTable extends Migration
{
    public function up()
    {
        Schema::create('teams_events',function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_event')->unsigned();
            $table->integer('id_team')->unsigned();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('teams_events');
    }
}
