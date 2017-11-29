<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends BaseModel
{
    public $table = 'reservations';

    public function projects(){
        return $this->belongsToMany('App\Project');
    }

    public function equipements(){
        return $this->belongsToMany('App\Equipement');
    }
}

