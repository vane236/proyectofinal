<?php

namespace App\Http\Controllers;

use App\Alumnos;
use App\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['alumnos'] = Alumnos::paginate(3);

        return view('alumnos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
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
            'apellidoPaterno' => 'required|string|max:100',
            'apellidoMaterno' => 'required|string|max:100',
            'telefono' => 'required|string|min:10|max:15',
            'email' => 'required|email|unique:alumnos',
            'Foto' => 'required|max:1000|mimes:jpeg,jpg,png'
        ];

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosAlumno = request()->except('_token');
        $cursos_id = $datosAlumno['cursos_id'];

        $datosAlumno = request()->except(['_token','cursos_id']);

        // Foto
        if($request->hasFile('Foto')){
            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads','public');
        }


        // relación de alumnos con cursos
        //$relation = Cursos::find($cursos_id)->alumnos;
        /*foreach ($relation as $rel) {
            print $cursos_id;
            print $rel->pivot->alumnos_id.'  cursos_id:'. $rel->pivot->cursos_id;
            //dd($rel->pivot->calificacion);
        }*/
        //dd($relation);
        //die();
        //var_dump($res['attached']);
        


        // Se insertan los datos
        Alumnos::insert($datosAlumno);

        // Se crea la relación de alumno con curso
        $size = sizeof(Alumnos::all()); 
        $alumno = Alumnos::all()[$size-1]; // el último que se agregó

        Cursos::findOrFail($cursos_id)->alumnos()->syncWithoutDetaching($alumno->id);
        Cursos::findOrFail($cursos_id)->alumnos()->updateExistingPivot($alumno->id,['calificacion' => 70]);
        
        //return response()->json($datosAlumno);

        return redirect('alumnos')->with('Mensaje','Alumno(a) agregado(a) con éxito');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumnos::findOrFail($id);

        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumnos::findOrFail($id);

        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'apellidoPaterno' => 'required|string|max:100',
            'apellidoMaterno' => 'required|string|max:100',
            'telefono' => 'required|string|min:10|max:15',
            'email' => 'required|email|unique:alumnos,email,'.$id
        ];

        if($request->hasFile('Foto')){
            $campos += ['Foto' => 'required|max:1000|mimes:jpeg,jpg,png'];
        }

        $Mensaje = ["required" => 'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        

        $datosAlumno = request()->except(['_token','_method','cursos_id']);
        

        if($request->hasFile('Foto')){
            
            $alumno = Alumnos::findOrFail($id);

            Storage::delete('public/'.$alumno->Foto);

            $datosAlumno['Foto'] = $request->file('Foto')->store('uploads','public');

        }

        Alumnos::where('id','=',$id)->update($datosAlumno);

        //$alumno = Alumnos::findOrFail($id);
        //return view('alumnos.index', compact('alumno'));
        return redirect('alumnos')->with('Mensaje','Datos modificados con éxito!!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumnos::findOrFail($id);

        if(Storage::delete('public/'.$alumno->Foto)){
            Alumnos::destroy($id);
        }else{
            Alumnos::destroy($id);
        }    

        return redirect('alumnos')->with('Mensaje','Alumno eliminado con éxito!');
    
    }


    public function addCursoEdit($id)
    {
        $alumno = Alumnos::findOrFail($id);

        return view('alumnos.addCurso', compact('alumno'));
    }

    // Param: alumno $id
    public function addCurso(Request $request,$id)
    {

        $campos = [
            'cursos_id' => 'required|string|max:100',
        ];

        $Mensaje = ["required" => 'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        

        $nuevoCurso = request()->all();
        $cursos_id = $nuevoCurso['cursos_id'];

        $curso = Cursos::find($cursos_id);
        $alumno = Alumnos::find($id);
        

        
        $res = Cursos::findOrFail($cursos_id)->alumnos()->syncWithoutDetaching($alumno->id);
        if ($res['attached'] == null) {
            return redirect('alumnos')->with('Mensaje','Alumno '.$alumno->nombre.' ya se encuentra inscrito en el curso de '.$curso->nombre.'!!');
        }else{            
            Cursos::findOrFail($cursos_id)->alumnos()->updateExistingPivot($alumno->id,['calificacion' => 70]);
        }

        return redirect('alumnos')->with('Mensaje','Alumno '.$alumno->nombre.' inscrito con éxito en el curso de '.$curso->nombre.'!!');
        
        //$alumno = Alumnos::findOrFail($id);
        //return view('alumnos.index', compact('alumno'));
   
    }
}
