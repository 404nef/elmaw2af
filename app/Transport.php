<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    public function streets(){
        return $this->belongsToMany('App\Street');
    }
}
