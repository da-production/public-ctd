<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Wilaya;
class Commune extends Model
{
    //
    protected $table = "commune";

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class,'wilaya_id','code');
    }
}
