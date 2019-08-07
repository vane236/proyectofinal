<?php

namespace App\Http\Controllers;

use App\Pagos;
use App\Alumnos;
use Illuminate\Http\Request;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['alumnos'] = Alumnos::paginate(3);

        return view('pagos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,$total)
    {   
        $datos['alumno'] = Alumnos::find($id);
        $total_['total'] = $total;

        return view('pagos.create', $datos,$total_);
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
            'pagoRelizado' => 'numeric'
        ];
        
        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        
        $datosPago = request()->except('_token');
        $alumno_id = $datosPago['alumnos_id'];

        $total = $datosPago['total'];

        $datosPago = request()->except('_token','total');
        $datosPago['fecha'] = Carbon::now(); // La fecha actual

        // Si se excedió del pago
        $cantidad = 0;
        foreach (Alumnos::find($alumno_id)->pagos as $pago){
            $cantidad += $pago->pagoRealizado;
        }
        
        $cantidad += $datosPago['pagoRealizado'];
        if ($cantidad > $total) {
            return redirect('pagos')->with('Mensaje','Esa cantidad sobrepasa lo que debe');    
        }

        
        //dd($datosPago['fecha']);
        
        Pagos::insert($datosPago);

        return redirect('pagos')->with('Mensaje','Pago agregado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show($id) // id del alumno para ver sus respectivos pagos
    {
        $alumno = Alumnos::findOrFail($id);

        return view('pagos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagos $pagos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagos $pagos)
    {
        //
    }
}
