<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends BaseModel
{
    public $table = 'events';

    public function teams(){
        return $this->belongsToMany('App\Teams');
    }
}
