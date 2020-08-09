<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddWilaya;
use App\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wilayas = Wilaya::orderBy('id','DESC')->paginate(15);
        $pagetitle = "Wilayas";
        return view('wilaya.index',compact('wilayas','pagetitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pagetitle = "Ajouter une nouvelle Wilaya";
        return view('wilaya.ajouter',compact('pagetitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddWilaya $request, Wilaya $wilaya)
    {
        //
        $wilaya->code = $request->code;
        $wilaya->wilaya = $request->wilaya;

        dd($wilaya);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wilaya  $wilaya
     * @return \Illuminate\Http\Response
     */
    public function show(Wilaya $wilaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wilaya  $wilaya
     * @return \Illuminate\Http\Response
     */
    public function edit(Wilaya $wilaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wilaya  $wilaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wilaya $wilaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wilaya  $wilaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wilaya $wilaya)
    {
        //
    }
}
