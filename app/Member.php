<?php

namespace App;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

class Member extends BaseModel
{
    public $table = 'members';

    public function managedTeams(){
        return $this->hasMany('App\Team','id_manager');
    }

    public function teams(){
        return $this->belongsToMany('App\Team','members_teams','id_member','id_team');
    }
}
