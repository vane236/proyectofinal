<?php

namespace App\Http\Controllers;

use App\Maestros;
use App\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['maestros'] = Maestros::paginate(3);

        return view('maestros.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maestros.create');
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
            'name' => 'required|string|max:100',
            'apellidoPaterno' => 'required|string|max:100',
            'apellidoMaterno' => 'required|string|max:100',
            'telefono' => 'required|string|min:10|max:15',
            'email' => 'required|email|unique:maestros',
            'password' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:8',
            'Foto' => 'required|max:1000|mimes:jpeg,jpg,png'
        ];

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosMaestro = request()->except(['_token','confirm_password']);

        // password Hash
        $datosMaestro['password'] = Hash::make($datosMaestro['password']);

        // Foto
        if($request->hasFile('Foto')){
            $datosMaestro['Foto'] = $request->file('Foto')->store('uploads','public');
        }

        Maestros::insert($datosMaestro);
        
        //return response()->json($datosMaestro);

        return redirect('maestros')->with('Mensaje','Maestro(a) agregado(a) con éxito');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maestro = Maestros::findOrFail($id);

        return view('maestros.show', compact('maestro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maestro = Maestros::findOrFail($id);

        return view('maestros.edit', compact('maestro'));
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
        $campos = [
            'name' => 'required|string|max:100',
            'apellidoPaterno' => 'required|string|max:100',
            'apellidoMaterno' => 'required|string|max:100',
            'telefono' => 'required|string|min:10|max:15',
            'email' => 'required|email|unique:maestros,email,'.$id,
            'password' => 'min:0|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:0'
        ];

        if($request->hasFile('Foto')){
            $campos += ['Foto' => 'required|max:1000|mimes:jpeg,jpg,png'];
        }

        $Mensaje = ["required" => 'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        
        $datosMaestro = request()->except(['_token','_method','confirm_password']);
        
        // Si las contraseñas están en blanco no se cambian
        if ($datosMaestro['password'] == '') {
            $datosMaestro = request()->except(['_token','_method','password','confirm_password']);    
        }else{
            // password Hash
            $datosMaestro['password'] = Hash::make($datosMaestro['password']);    
        }
        

        if($request->hasFile('Foto')){
            
            $maestro = Maestros::findOrFail($id);

            Storage::delete('public/'.$maestro->Foto);

            $datosMaestro['Foto'] = $request->file('Foto')->store('uploads','public');

        }

        Maestros::where('id','=',$id)->update($datosMaestro);

        //$maestro = Maestros::findOrFail($id);
        //return view('Maestros.index', compact('Maestro'));
        return redirect('maestrosHome')->with('Mensaje','Datos modificados con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maestro = Maestros::findOrFail($id);

        // Quitar la relación con cursos
        foreach ($maestro->cursos as $curso) {
            Cursos::find($curso->id)->maestros()->detach($maestro->id);
        }

        if(Storage::delete('public/'.$maestro->Foto)){
            Maestros::destroy($id);
        }else{
            Maestros::destroy($id);
        }    

        return redirect('maestros')->with('Mensaje','maestro eliminado con éxito');
    
    }
}
