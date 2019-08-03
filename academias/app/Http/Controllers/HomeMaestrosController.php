<?php

namespace App\Http\Controllers;

use App\Maestros;
use App\Academias;
use App\User;
use Illuminate\Http\Request;

class HomeMaestrosController extends Controller
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
        $countAcademias = Academias::count();
        $countUsuarios = User::count();
        return view('maestrosHome',compact(['countAcademias','countUsuarios']));
    }

}