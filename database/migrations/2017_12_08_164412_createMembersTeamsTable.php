<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('members_teams',function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_member')->unsigned();
            $table->integer('id_team')->unsigned();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('members_teams');
    }
}
