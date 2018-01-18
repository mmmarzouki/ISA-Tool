<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends BaseModel
{
    public $table = 'reservations';

    public function projects(){
        return $this->belongsToMany('App\Project','reservations_projects','id_reservation','id_project');
    }

    public function equipements(){
        return $this->belongsToMany('App\Equipement','equipements_reservations','id_reservation','id_equipment ');
    }
}

