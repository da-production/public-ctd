<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Demande;
use App\Doc;
use App\Http\Requests\DemandeAvis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show($setid, $nom)
    {
        //
        $demande = DB::table('demandes')
        ->leftjoin('commune','demandes.code_commune','commune.code')
        ->leftjoin('users','demandes.affecter','users.id')
        ->leftjoin('agences','users.agences_id','agences.id')
        ->leftjoin('wilaya','commune.wilaya_id','wilaya.code')
        ->leftjoin('document_domander','demandes.id','document_domander.id_domande')
        ->leftjoin('documents','document_domander.id_document','documents.id')
        ->select(
            'demandes.*',
            'demandes.id as demande_id',
            'commune.lib_commune',
            'users.id as user_id', 'users.agences_id',
            'agences.name as agence',
            'wilaya.wilaya as wilaya',
            'document_domander.etat as etat_document','documents.*'
            )
        ->where('demandes.id', '=', $setid)
        ->where('demandes.nom', '=', $nom)
        ->first();
        $user = DB::table('users')->where('id', '=', $demande->user_id)->select('users.user')->first();
        $demande->sendby = DB::table('users')->where('id', '=', $demande->send_by)->select('users.user')->first()->user;
        $demande->affecter_to = $user->user;
        return response()->json($demande);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(demande $demande)
    {
        //
    }

    public function avis(DemandeAvis $request, $identifiant)
    {
        $demande = Demande::where([
            ['id', '=', $request->id]
        ])
        ->first();
        $demande->etat = $request->etat;
        $demande->remarque = $request->motif;
        $demande->save();
        $doc = Doc::where('id_domande', "=", $request->id)->first();
        $doc->etat = $demande->etat;
        $doc->save();
        return 'Demande Traiter';
    }
}
