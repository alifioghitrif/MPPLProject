<?php

namespace App\Http\Controllers;

use App\Models\wargadesa;
use App\Http\Requests\StorewargadesaRequest;
use App\Http\Requests\UpdatewargadesaRequest;

class WargadesaController extends Controller
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
     * @param  \App\Http\Requests\StorewargadesaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewargadesaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wargadesa  $wargadesa
     * @return \Illuminate\Http\Response
     */
    public function show(wargadesa $wargadesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wargadesa  $wargadesa
     * @return \Illuminate\Http\Response
     */
    public function edit(wargadesa $wargadesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewargadesaRequest  $request
     * @param  \App\Models\wargadesa  $wargadesa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewargadesaRequest $request, wargadesa $wargadesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wargadesa  $wargadesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(wargadesa $wargadesa)
    {
        //
    }

    public function getkelahiran()
    {
        return view('kelahiran', [
            "wargadesa" => \App\Models\wargadesa::all()
            ]);
    }

    public function getJK()
    {
        return view('jenis-kelamin', [
            "wargadesa" => \App\Models\wargadesa::all()
            ]);
    }
}
