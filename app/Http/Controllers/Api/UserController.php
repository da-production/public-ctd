<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
    public function store(AddUser $request)
    {
        //
        //$request = $request->datas;
        //dd($request->all());
        $user = User::create([
            'privilage' => $request->previlage,
            'agences_id' => $request->agence_id,
            'user'      => $request->user,
            'first_name'=> $request->first_name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'password'  => $request->password,
        ]);
        if($user){
            return back()->with('success','Utilisateur ajouter');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id,$username)
    {
        //
        $user = User::where([
            ['id', '=', $id],
            ['user', '=', $username]
        ])
        ->first();
        dd($user);
    }

    public function changestat(Request $request,$id,$username)
    {
        /*
        ** Change stat 
        */
        $user = User::where([
            ['id', '=', $id],
            ['user', '=', $username]
        ])
        ->first();
        
        $user->etat = $request->stat == 1;
        $user->save();


        /*
        ** if the stat is for disabling user
        */
        if($request->stat == 0){

            /*
            ** check if the user is cellue 
            */
            if($user->privilage == 4){

                // get all demande for the current user are disabled
                $demandes = DB::table('demandes')
                ->where([
                    ['demandes.affecter', '=' , $id],
                    ['demandes.etat', '=' , '5']
                ])
                ->get();

                // count all user are abble and type cellue
                $count_user = count(User::AllUserAble());

                // count all demande for the current user are disabled
                $count_demande = count($demandes);

                // send demnades for each usser are able
                for($i = 0; $i <= $count_demande; $i++){

                    // index for back to count 0 when i is > count user
                    $index = $i % $count_user;

                    // get one demande for current user and send it for another with index
                    $demande = DB::table('demandes')
                    ->where([
                        ['demandes.affecter', '=' , $id],
                        ['demandes.etat', '=' , '5']
                    ])
                    ->limit(1)
                    ->update(array('affecter' => User::AllUserAble()[$index]->id));
                }

            }
        }
        
        return "Utilisateur modifier";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
