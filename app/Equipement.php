<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipement extends BaseModel
{
    public $table = 'equipements';

    public function reservations(){
        return $this->belongsToMany('App\Reservation','equipements_reservations','id_equipment','id_reservation');
    }
}
