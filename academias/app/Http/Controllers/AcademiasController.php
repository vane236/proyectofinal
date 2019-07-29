<?php

namespace App\Http\Controllers;

use App\Academias;
use Illuminate\Http\Request;

class AcademiasController extends Controller
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
        return view('academias.create');
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
     * @param  \App\Academias  $academias
     * @return \Illuminate\Http\Response
     */
    public function show(Academias $academias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academias  $academias
     * @return \Illuminate\Http\Response
     */
    public function edit(Academias $academias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academias  $academias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academias $academias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academias  $academias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academias $academias)
    {
        //
    }
}
