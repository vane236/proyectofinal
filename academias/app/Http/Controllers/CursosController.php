<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Maestros;
use App\Academias;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cursos'] = Cursos::paginate(3);

        return view('cursos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
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
            'academias_id' => 'required|string',
            'maestros_id' => 'required|string',
            'nombre' => 'required|string|max:50',
            'precio' => 'required|numeric'
        ];

        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        
        
        $this->validate($request,$campos,$Mensaje);


        $datosCurso = request()->except('_token');
        $academias_id = $datosCurso['academias_id'];
        $maestros_id = $datosCurso['maestros_id'];

        $datosCurso = request()->except(['_token','academias_id','maestros_id']);

        //Quitar acentos y convertir a mayúsculas

        //Codificamos la cadena en formato utf8 en caso de que nos de errores
        $cadena = $datosCurso['nombre'];

        //$cadena = utf8_encode($cadena);

        //Ahora reemplazamos las letras
        $cadena = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $cadena
        );

        $cadena = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $cadena );

        $cadena = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $cadena );

        $cadena = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $cadena );

        $cadena = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $cadena );
        
        // Mayúscula
        $cadena = strtoupper($cadena);
        ///////////////////////////////////////
        
        // Se insertan los datos
        $datosCurso['nombre'] = $cadena;
        cursos::insert($datosCurso);

        
        // Se crea la relación de curso con academia
        $size = sizeof(Cursos::all()); // tamaño del arreglo de todos los cursos
        $curso = Cursos::all()[$size-1]; // El último curso añadido
        
        Academias::find($academias_id)->cursos()->attach($curso);
        Maestros::find($maestros_id)->cursos()->attach($curso);

        //return response()->json($$datoscurso);

        return redirect('cursos')->with('Mensaje','curso agregado con éxito!!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Cursos::findOrFail($id);

        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cursos $cursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Cursos::findOrFail($id);

        Cursos::destroy($id);
        return redirect('cursos')->with('Mensaje','curso eliminado con éxito');
    
    }
}
