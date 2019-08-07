<?php

namespace App\Http\Controllers;

use App\Maestros;
use App\Academias;
use App\Horarios;
use App\Alumnos;
use App\Cursos;
use App\Pagos;
use App\User;
use Auth;
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
        
        $countCursos = sizeof(Maestros::find(Auth::user()->id)->cursos);
        foreach (Maestros::find(Auth::user()->id)->cursos as $curso) {
            $countAcademias = sizeof(Cursos::find($curso->id)->academias);
            $countAlumnos = sizeof(Cursos::find($curso->id)->alumnos);
            break;
        }
    
        return view('maestrosHome',compact(['countAcademias','countAlumnos','countCursos']));
    }

}