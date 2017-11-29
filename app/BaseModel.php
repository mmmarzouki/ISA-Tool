<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class baseModel extends Model
{
    public $timestamps = false;
    public $protected = ['id'];
    public function getColumns() {
        return \DB::getSchemaBuilder()->getColumnListing($this->table);
    }
}
