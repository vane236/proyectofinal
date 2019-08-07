<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Alumnos;
use Illuminate\Http\Request;

class calificaciones extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datosCurso = Cursos::findOrFail($id);

        return view('maestroDashboard.verCurso', compact('datosCurso'));
    }


    public function modificarCalificacion($curso_id, $alumno_id)
    {
        $datosCurso = Cursos::findOrFail($curso_id);
        $datosAlumno = Alumnos::findOrFail($alumno_id);

        return view('maestroDashboard.modificarCalificacion', compact('datosCurso','datosAlumno'));
    }


    public function nuevaCalificacion(Request $request, $curso_id, $alumno_id)
    {
        $campos = [
            'calificacion' => 'required|min:0|numeric|max:100'
        ];

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datoCalificacion = request()->except(['_token','_method']);
        $calificacion =  $datoCalificacion['calificacion'];
        /*if($request->hasFile('Foto')){
            $$datoCalificacion['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        if (Cursos::find($curso_id)->alumnos()->updateExistingPivot($alumno_id,['calificacion' => $calificacion]) == 1) {
            return redirect('maestroDashboard/verCurso/'.$curso_id)->with('Mensaje','calificacion modificada con éxito!');
        }
        
        return redirect('maestroDashboard/cursos')->with('Mensaje','calificacion modificada');
        //return response()->json($$datoCalificacion);

   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
