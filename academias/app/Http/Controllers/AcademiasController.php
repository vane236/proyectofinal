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
        $datos['academias'] = Academias::paginate(3);

        return view('academias.index', $datos);
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
        $campos = [
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:500|unique:academias',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|unique:academias'
            //'Foto' => 'required|max:1000|mimes:jpeg,jpg,png'
        ];

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosAcademia = request()->except('_token');

        /*if($request->hasFile('Foto')){
            $$datosAcademia['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        Academias::insert($datosAcademia);
        
        //return response()->json($$datosAcademia);

        return redirect('academias')->with('Mensaje','academia agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Academias  $academias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $academia = Academias::findOrFail($id);

        return view('academias.show', compact('academia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Academias  $academias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $academia = Academias::findOrFail($id);

        return view('academias.edit', compact('academia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Academias  $academias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string|max:500|unique:academias,direccion,'.$id,
            'telefono' => 'required|string|max:15',
            'email' => 'required|email|unique:academias,email,'.$id
        ];

        /*if($request->hasFile('Foto')){
            $campos += ['Foto' => 'required|max:1000|mimes:jpeg,jpg,png'];
        }*/

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        
        $datosacademia = request()->except(['_token','_method']);


        /*if($request->hasFile('Foto')){

            $academia = academias::findOrFail($id);
            Storage::delete('public/'.$academia->Foto);
            $datosacademia['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        Academias::where('id','=',$id)->update($datosacademia);

        //$academia = Academias::findOrFail($id);
        //return view('academias.index', compact('academia'));
        return redirect('academias')->with('Mensaje','Academia modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Academias  $academias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academia = Academias::findOrFail($id);

        /*if(Storage::delete('public/'.$academia->Foto)){
            Academias::destroy($id);
        }*/
        Academias::destroy($id);
        return redirect('academias')->with('Mensaje','Academia eliminada con éxito');
    }
}
