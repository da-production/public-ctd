<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Doc;
use App\Http\Requests\NewDemande;
use App\Notifications\NewDemande as NotificationsNewDemande;
use App\User;
use App\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $where = [];
        $pageAppend = [];
        $limit = 10;

        if(($request->has('identifiant')) && ($request->identifiant != null))
        {
            array_push($where, ['demandes.identifiant','=',$request->identifiant]);
            $pageAppend['identifiant'] = $request->identifiant;
        }

        if(($request->has('limit')) && ($request->limit != null))
        {
            $limit = $request->limit;
            $pageAppend['limit'] = $request->limit;
        }
        
        if(($request->has('nom')) && ($request->nom != null))
        {
            array_push($where, ['nom','=',$request->nom]);
            $pageAppend['nom'] = $request->nom;
        }

        if(($request->has('prenom')) && ($request->prenom != null))
        {
            array_push($where, ['prenom','=',$request->prenom]);
            $pageAppend['prenom'] = $request->prenom;
        }

        if(($request->has('etat')) && ($request->etat != null))
        {
            array_push($where, ['demandes.etat','=',$request->etat]);
            $pageAppend['etat'] = $request->etat;
        }

        if(($request->has('wilaya_code')) && ($request->wilaya_code != null))
        {
            array_push($where, ['wilaya.code','=',$request->wilaya_code]);
            $pageAppend['wilaya_code'] = $request->wilaya_code;
        }

        if(($request->has('lib_commune')) && ($request->lib_commune != null))
        {
            array_push($where, ['commune.lib_commune','like','%'.$request->lib_commune.'%']);
            $pageAppend['lib_commune'] = $request->lib_commune;
        }
        
        if(Auth::user()->privilage == 1){
            $demandes = Demande::isAdmin($where,$pageAppend,$limit);
        }elseif(Auth::user()->privilage == 5){
            $demandes = Demande::isClient($where,$pageAppend,$limit);
        }else{
            $demandes = Demande::isCellule($where,$pageAppend,$limit);
        }
        
        //dd($demandes);
        $pagetitle = 'Boite de réception';
        return view('demande.index',compact('demandes','pagetitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagetitle = "Nouvelle demande";
        $wilayas = Wilaya::all();

        return view('demande.ajouter', compact('pagetitle','wilayas'));
    }

    public function getLastId()
    {
        // get all user with privilage 4
        return User::getLastId();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewDemande $request)
    {
        //
        $doc = new Doc;
        $demande = new Demande;
        
        $demande->affecter = $this->getLastId();
        $demande->identifiant = $request->identifiant;
        $demande->id_unique = $request->identifiant . "-" . date("Y-m-d");
        $demande->print_id = $request->identifiant . "-" . date("Y-m-d");
        $demande->nom = $request->nom;
        $demande->prenom = $request->prenom;
        $demande->naissance = $request->naissance;
        $demande->presume = $request->presume;
        $demande->father = $request->father;
        $demande->mother = $request->mother;
        $demande->code_commune = $request->code_commune;
        $demande->etat = 5;
        $demande->date_d = date("Y-m-d H:i:s");
        $demande->date_t = date("Y-m-d H:i:s");
        $demande->send_by = Auth::user()->id;

        if($demande->save())
        {
            $lastId = DB::table('demandes')->orderBy('id','DESC')->limit(1)->first();
            $doc->id_document = $request->id_document;
            $doc->id_domande  = $lastId->id;
        }

        $user = User::find($this->getLastId());

        $user->notify(new NotificationsNewDemande($demande,Auth::user()));

        return back()->with('success',"Demande '" . $demande->identifiant . "' ajouter avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show($prenom,$nom)
    {
        //
        $demande = DB::table('demandes')
        ->leftjoin('commune','demandes.code_commune','commune.code')
        ->leftjoin('users','demandes.affecter','users.id')
        ->leftjoin('agences','users.agences_id','agences.id')
        ->leftjoin('wilaya','agences.id_wilaya','wilaya.code')
        ->leftjoin('document_domander','demandes.id','document_domander.id_domande')
        ->leftjoin('documents','document_domander.id_document','documents.id')
        ->select('demandes.*','commune.lib_commune','users.*','wilaya.wilaya','agences.name as agence','document_domander.etat as etat_document','documents.*')
        ->where([
            ['demandes.nom', '=', $nom],
            ['demandes.prenom', '=', $prenom]
        ])
        ->first();
        return view('demande.show')->with(['demande'=>$demande]);
    }

    public function notification( $identifiant, $id, DatabaseNotification $notification){

        $demande = DB::table('demandes')
        ->leftjoin('commune','demandes.code_commune','commune.code')
        ->leftjoin('users','demandes.affecter','users.id')
        ->leftjoin('agences','users.agences_id','agences.id')
        ->leftjoin('wilaya','agences.id_wilaya','wilaya.code')
        ->leftjoin('document_domander','demandes.id','document_domander.id_domande')
        ->leftjoin('documents','document_domander.id_document','documents.id')
        ->select('demandes.*','commune.lib_commune','users.*','wilaya.wilaya','agences.name as agence','document_domander.etat as etat_document','documents.*')
        ->where([
            ['demandes.identifiant', '=', $identifiant],
            ['demandes.id', '=', $id]
        ])
        ->first();
        $notification->markAsRead();
        return view('demande.show')->with(['demande'=>$demande]);

    }

    public function notifications(){
        $notifications = DB::table('notifications')->where('notifiable_id', auth()->user()->id)->get();
        $pagetitle = 'Notifications';
        return view('demande.notifications', compact(['notifications','pagetitle']));
    }

    public function modifier($identifiant,$prenom,$nom)
    {
        //
        $demande = DB::table('demandes')
        ->leftjoin('commune','demandes.code_commune','commune.code')
        ->leftjoin('users','demandes.affecter','users.id')
        ->leftjoin('agences','users.agences_id','agences.id')
        ->leftjoin('wilaya','agences.id_wilaya','wilaya.code')
        ->leftjoin('document_domander','demandes.id','document_domander.id_domande')
        ->leftjoin('documents','document_domander.id_document','documents.id')
        ->select('demandes.*','commune.lib_commune','users.*','wilaya.wilaya','agences.name as agence','document_domander.etat as etat_document','document_domander.id_document','documents.*')
        ->where([
            ['demandes.identifiant', '=', $identifiant],
            ['demandes.nom', '=', $nom],
            ['demandes.prenom', '=', $prenom]
        ])
        ->first();
        $wilayas = Wilaya::all();
        return view('demande.modifier', compact('demande','wilayas'));
    }

    public function print($nom)
    {
        //
        $demande = DB::table('demandes')
        ->leftjoin('commune','demandes.code_commune','commune.code')
        ->leftjoin('users','demandes.affecter','users.id')
        ->leftjoin('agences','users.agences_id','agences.id')
        ->leftjoin('wilaya','agences.id_wilaya','wilaya.code')
        ->leftjoin('document_domander','demandes.id','document_domander.id_domande')
        ->leftjoin('documents','document_domander.id_document','documents.id')
        ->select('demandes.*','commune.lib_commune','users.*','wilaya.wilaya','agences.name as agence','document_domander.etat as etat_document','documents.*')
        ->where([
            ['demandes.nom', '=', $nom]
        ])
        ->first();
        /*
        $mpdf = New Mpdf();
        $html = \View::make('demande.print')->with('demande',$demande);
        $mpdf->WriteHTML($html);
        $mpdf->Output($demande->nom, 'I'); 
        */
        return view('demande.print')->with('demande',$demande);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nom)
    {
        //
        $demande = Demande::where('nom',$nom)->first();
        $doc = DB::table('document_domander')->where('id_domande',$demande->id)->first();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
