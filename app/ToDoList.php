<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends BaseModel
{
    public $table = 'todo_lists';

    public function project(){
        return $this->belongsTo('App\Project','id_project');
    }
}
