<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Commune;

class CommuneController extends Controller
{
    //
    public function byWilaya($code)
    {
        $communes = Commune::where('wilaya_id',"=",$code)->get();
        return $communes;
    }
}
