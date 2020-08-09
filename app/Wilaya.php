<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Commune;
use App\Agence;
class Wilaya extends Model
{
    //

    protected $table = "wilaya";

    public function communes()
    {
        return $this->hasMany(Commune::class,'wilaya_id','code');
    }
    public function agences()
    {
        return $this->hasMany(Agence::class,'id_wilaya','code');
    }
    public function lelo()
    {
        return 1;
    }
}
