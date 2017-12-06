<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsProjectsTable extends Migration
{public function up()
{
    Schema::create('reservations_projects',function(Blueprint $table){
        $table->increments('id');
        $table->integer('id_reservation')->unique();
        $table->integer('id_projects')->unique();
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('reservations_projects');
    }
}
