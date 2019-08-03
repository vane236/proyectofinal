<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['usuarios'] = User::paginate(3);

        return view('usuarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
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
            'email' => 'required|email|unique:academias',
            'password' => 'required|min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:8',
            //'Foto' => 'required|max:1000|mimes:jpeg,jpg,png'
        ];

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosUsuario = request()->except(['_token','confirm_password']);

        // password Hash
        $datosUsuario['password'] = Hash::make($datosUsuario['password']);

        /*if($request->hasFile('Foto')){
            $datosUsuario['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        User::insert($datosUsuario);
        
        //return response()->json($datosUsuario);

        return redirect('academias')->with('Mensaje','Administrador agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $academias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = usuarios::findOrFail($id);

        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $academias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = usuarios::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $academias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:academias,email,'.$id,
            'password' => 'required|min:8',
        ];

        /*if($request->hasFile('Foto')){
            $campos += ['Foto' => 'required|max:1000|mimes:jpeg,jpg,png'];
        }*/

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        
        $datosUsuario = request()->except(['_token','_method']);


        /*if($request->hasFile('Foto')){

            $academia = academias::findOrFail($id);
            Storage::delete('public/'.$academia->Foto);
            $datosUsuario['Foto'] = $request->file('Foto')->store('uploads','public');
        }*/

        User::where('id','=',$id)->update($datosUsuario);

        //$academia = Academias::findOrFail($id);
        //return view('academias.index', compact('academia'));
        return redirect('academias')->with('Mensaje','Administrador modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $academias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = usuarios::findOrFail($id);

        /*if(Storage::delete('public/'.$usuario->Foto)){
            usuarios::destroy($id);
        }*/
        usuarios::destroy($id);
        return redirect('usuarios')->with('Mensaje','usuario eliminada con éxito');
    }
}
