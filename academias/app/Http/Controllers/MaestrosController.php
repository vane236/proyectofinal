<?php

namespace App\Http\Controllers;

use App\Maestros;
use Illuminate\Http\Request;

class MaestrosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:maestros');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('maestrosHome');
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
     * @param  \App\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function show(Maestros $maestros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function edit(Maestros $maestros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maestros $maestros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maestros  $maestros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maestros $maestros)
    {
        //
    }
}