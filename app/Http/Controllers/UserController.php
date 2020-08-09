<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserUpdate;
use App\User;
use App\Wilaya;
use App\Previlage;
use App\Agence;
use App\Http\Requests\AddUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = [];
        $pageAppend = [];
        //
        if(($request->has('first_name')) && ($request->first_name != null))
        {
            array_push($where, ['users.first_name','like','%'.$request->first_name.'%']);
            $pageAppend['first_name'] = $request->first_name;
        }

        //
        if(($request->has('last_name')) && ($request->last_name != null))
        {
            array_push($where, ['users.last_name','like','%'.$request->last_name.'%']);
            $pageAppend['last_name'] = $request->last_name;
        }

        //
        if(($request->has('user')) && ($request->user != null))
        {
            array_push($where, ['users.user','like','%'.$request->user.'%']);
            $pageAppend['user'] = $request->user;
        }

        if(($request->has('agences_id')) && ($request->agences_id != null))
        {
            array_push($where, ['users.agences_id','=',$request->agences_id]);
            $pageAppend['agences_id'] = $request->agences_id;
        }

        if(($request->has('privilage')) && ($request->privilage != null))
        {
            array_push($where, ['users.privilage','=',$request->privilage]);
            $pageAppend['privilage'] = $request->privilage;
        }

        $wilayas = Wilaya::all();
        $agences = Agence::all();
        $pagetitle = "Utilisateurs";
        $users = User::orderBy('privilage','ASC')
        ->where($where)
        ->paginate(15)
        ->appends($pageAppend);
        $previlages = Previlage::all();

        return view('user.index',compact('users','wilayas','agences','previlages','pagetitle'));
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user,$id)
    {
        //
        $user = User::where([
            ['users.user', '=', $user],
            ['users.id', '=', $id]
        ])->first();
        $pagetitle = 'CTD | Edit ' . $user->user;
        return view('user.edit',compact('user','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request)
    {
        //
        $user = User::find($request->id);
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->email        = $request->email;
        $user->save();
        return back()->with('success','Profile Modifier');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function password(PasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);
        dd($user);
        $user->password     =   Hash::make($request->password);
        $user->save();

        return back()->with('success','Mot de passe changer');
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
