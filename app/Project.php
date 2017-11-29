<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends BaseModel
{
    public $table = 'projects';

    public function toDoLists(){
        return $this ->hasMany('App\ToDoList','id_project','id');
    }

    public function reservations(){
        return $this->belongsToMany('App\Reservations');
    }

    public function team(){
        return $this->belongsTo('App\Team','id','id_team');
    }
}
