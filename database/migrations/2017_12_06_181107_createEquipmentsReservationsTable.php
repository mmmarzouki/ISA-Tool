<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentsReservationsTable extends Migration
{
    public function up()
{
    Schema::create('equipements_reservations',function(Blueprint $table){
        $table->increments('id');
        $table->integer('id_reservation')->unsigned();
        $table->integer('id_equipments')->unsigned();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('equipements_reservations');
}
}
