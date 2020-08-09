<?php

namespace App\Http\Controllers;

use App\Previlage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrevilageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $previlages = Previlage::all();
        $previlage = DB::table('previlage')
        ->first();
        $pagetitle = 'Previlages';
        return view('previlage.index', compact(['previlage','pagetitle']));
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
     * @param  \App\Previlage  $previlage
     * @return \Illuminate\Http\Response
     */
    public function show(Previlage $previlage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Previlage  $previlage
     * @return \Illuminate\Http\Response
     */
    public function edit(Previlage $previlage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Previlage  $previlage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Previlage $previlage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Previlage  $previlage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Previlage $previlage)
    {
        //
    }
}
