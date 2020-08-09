<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasPermission extends Model
{
    //
    public function previlage(){
        return $this->belongsTo('App\Previlage','id','previlage_id');
    }
}
