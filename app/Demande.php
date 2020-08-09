<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Demande extends Model
{
    //
    public $timestamps = false;

    protected $table = "demandes";

    public function scopeIsCellule($query, $where,$pageAppend,$limit)
    {
        return $query->where([
                ['affecter',Auth::user()->id],
            ])
        ->where($where)
        ->leftJoin('users', 'demandes.send_by', '=', 'users.id')
        ->select('users.id', 'users.agences_id','demandes.*')
        ->orderByRaw("FIELD(demandes.etat , '1', '2', '3', '5') DESC")
        ->paginate($limit)->appends($pageAppend);
    }

    public function scopeIsClient($query, $where,$pageAppend,$limit)
    {
        return $query->where([
                ['send_by',Auth::user()->id],
                ['demandes.etat','<>', 5],
            ])
        ->where($where)
        ->leftJoin('users', 'demandes.send_by', '=', 'users.id')
        ->select('users.id', 'users.agences_id','demandes.*')
        ->orderByRaw("FIELD(demandes.etat , '1', '2', '3') DESC")
        ->paginate($limit)->appends($pageAppend);
    }

    public function scopeIsAdmin($query, $where,$pageAppend,$limit)
    {
        return $query->leftJoin('users', 'demandes.send_by', '=', 'users.id')
        ->select('users.id', 'users.agences_id','demandes.*')
        ->orderByRaw("FIELD(demandes.etat , '1', '2', '3', '5') DESC, date_d ASC")
        ->where($where)
        ->paginate($limit)->appends($pageAppend);
    }
}
