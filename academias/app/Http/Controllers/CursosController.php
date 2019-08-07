<?php

namespace App\Http\Controllers;

use App\Cursos;
use App\Maestros;
use App\Academias;
use App\Horarios;
use App\Alumnos;
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
        // Se obtienen todos los nombres
        $size = sizeof(Cursos::all());
        $cursos = [];
        for ($i=0; $i < $size; $i++) { 
            $nombreCurso = Cursos::all()[$i]->nombre;
            $cursos[$nombreCurso] = Cursos::all()[$i]->id;
        }
        
        // Se ordena el arreglo
        ksort($cursos);

        $datos['cursosNombres'] = $cursos;
        
        return view('cursos.create', $datos);
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
            'cursos_id' => 'string',
            'horarios_id' => 'string',
            'nombre' => '',
            'precio' => ''
        ];
        
        // Se traen todos los datos, excepto _token
        $datosCurso = request()->except('_token');
        $academias_id = $datosCurso['academias_id'];
        $maestros_id = $datosCurso['maestros_id'];
        $cursos_id = $datosCurso['cursos_id'];
        $horarios_id = $datosCurso['horarios_id'];
        
        //Quitar acentos y convertir a mayúsculas
        $cadena = $datosCurso['nombre'];
        if ($datosCurso['nombre'] != '') {
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
        }    
        
        ///////////////////////////////////////


        // se traen todos los datos necesarios
        $datosCurso = request()->except(['_token','academias_id','maestros_id', 'cursos_id','horarios_id']);
        // Se le asigna el nombre sin acentos y en mayúsculas
        $datosCurso['nombre'] = $cadena;

        if ($cursos_id == 'seleccionar') { // no se seleccionó un curso
            $campos['nombre'] = 'required|string|max:50';
            $campos['precio'] = 'required|numeric';
            // Se verifica que no exista ese curso
            foreach (Cursos::all() as $curso) {
                if ($curso->nombre == $datosCurso['nombre']) {
                    return redirect('cursos/create')->with('Mensaje','El curso '.$datosCurso['nombre'].' ya existe, búscalo en la lista');
                }
            }
            
        }else{
            // se toman los datos del curso seleccionado
            $datosCurso['nombre'] = Cursos::find($cursos_id)->nombre;
            $datosCurso['precio'] = Cursos::find($cursos_id)->precio;
            //dd(Cursos::find($cursos_id)->nombre);
            //die();
        }


        $Mensaje = ["required" => 'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        


        // Si la academia ya tiene ese curso - Se compara el nombre
        $academiaNombre = Academias::find($academias_id)->nombre;
        $size = sizeof(Cursos::all());
        
        foreach (Academias::find($academias_id)->cursos as $curso) {
            if ($curso->nombre == $datosCurso['nombre']) {
                    // El nombre se ha repetido
                // Si el curso ya tiene ese maestro asociado
                foreach (Maestros::find($maestros_id)->cursos as $cursoMaestro) {
                    if ($cursoMaestro->nombre == $datosCurso['nombre']) {
                        return redirect('cursos/create')->with('Mensaje','La academia '.$academiaNombre.' ya cuenta con el curso de '.$datosCurso['nombre']);
                    }
                }
            }
        }
    

        // Se verifica que el maestro no está en otro curso a la hora definida
        $hora_inicio = Horarios::find($horarios_id)->horaInicio;
        foreach (Maestros::find($maestros_id)->cursos as $curso) {
            foreach (Cursos::find($curso->id)->horarios as $horario) {
                if ($hora_inicio == $horario->horaInicio) {
                    return redirect('cursos/create')->with('Mensaje','El profesor ya imparte clases en ese horario!!');            
                }
            }
        }

        // Se insertan los datos, si no entró a la condición
        cursos::insert($datosCurso);

        
        // Se crea la relación de curso con academia, maestro y horario
        $size = sizeof(Cursos::all()); // tamaño del arreglo de todos los cursos
        $curso = Cursos::all()[$size-1]; // El último curso añadido
        
        Horarios::find($horarios_id)->cursos()->attach($curso);
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

        // Quitar la relación con academias
        foreach ($curso->academias as $academia) {
            Academias::find($academia->id)->cursos()->detach($curso->id);
        }

        // Quitar la relación con maestros
        foreach ($curso->maestros as $maestro) {
            Maestros::find($maestro->id)->cursos()->detach($curso->id);
        }

        // Quitar la relación con alumnos
        foreach ($curso->alumnos as $alumno) {
            Alumnos::find($alumno->id)->cursos()->detach($curso->id);
        }

        // Quitar la relación con horarios
        foreach ($curso->horarios as $horario) {
            Horarios::find($horario->id)->cursos()->detach($curso->id);
        }

        
        Cursos::destroy($id);
        return redirect('cursos')->with('Mensaje','curso eliminado con éxito');
    
    }

    public function other()
    {
        //
    }
}
