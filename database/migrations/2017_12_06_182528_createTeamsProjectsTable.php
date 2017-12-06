<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsProjectsTable extends Migration
{
    public function up()
    {
    Schema::create('teams_projects',function (Blueprint $table){
        $table->increments('id');
        $table->integer('id_project')->unsigned();
        $table->integer('id_team')->unsigned();
        $table->timestamps();
    });
    }
    public function down()
    {
        Schema::dropIfExists('teams_projects');
    }
}
