<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    public function transports(){
        return $this->belongsToMany('App\Transport');
    }
}
