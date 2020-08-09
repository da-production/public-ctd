<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Previlage extends Model
{
    //
    protected $table = 'previlage';

    public function hasPermissions(){
        return $this->hasMany('App\HasPermission','id','previlage_id');
    }
    
}
