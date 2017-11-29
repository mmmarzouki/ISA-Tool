<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends BaseModel
{
    public $table = 'teams';

    public function projects(){
        return $this->hasMany('App\Project','id_team','id');
    }

    public function members(){
        return $this->belongsToMany('App\Member');
    }

    public function manager(){
        return $this->belongsTo('App\Member','id','id_manager');
    }

    public function events(){
        return $this->belongsToMany('App\Event');
    }
}
