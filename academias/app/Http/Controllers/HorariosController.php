<?php

namespace App\Http\Controllers;

use App\Horarios;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['horarios'] = Horarios::paginate(5);

        return view('horarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'horaInicio' => 'min:7|required|numeric|max:18|unique:horarios',
            'horaFin' => 'min:7|required|numeric|max:18'
        ];

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosHorario = request()->except('_token');

        
        // Las clases son de 7 a 18 hrs


        // Se valida que la hora de inicio sea menor
        if ($datosHorario['horaInicio'] >= $datosHorario['horaFin']) 
        {
            return redirect('horarios/create')->with('MensajeError','La hora de inicio tiene que ser menor que la hora de fin de clase.');    
        }

        // Que sea una hora de diferencia
        if ($datosHorario['horaFin'] - $datosHorario['horaInicio'] != 1) {
            return redirect('horarios/create')->with('MensajeError','La clase sólo dura una hora.');
        }

        Horarios::insert($datosHorario);
        
        //return response()->json($datosHorario);

        return redirect('horarios')->with('Mensaje','Horario agregado con éxito!');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function show(Horarios $horarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Horarios $horarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horarios $horarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Horarios::destroy($id);

        return redirect('horarios')->with('Mensaje','Horario eliminado con éxito!');
    }
}
