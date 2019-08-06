@extends('layouts.app2')

@section('content')

<center>
<div class="container">


<br>

<!-- FOTO -->
<div class="form-group">
        @if(isset($alumno->Foto))
        <br>
        <img src="{{ asset('storage').'/'.$alumno->Foto }}" class="img-thumbnail" alt="" width="200">
        <br>
        @endif   
    </div>

<!-- Nombre -->
<div class="form-group">
    <label for="nombre" class="control-label"> Nombre completo <br>
        <strong>{{ $alumno->nombre.' '.$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno }}</strong>
    </label>
</div>

<!-- Email -->
<div class="form-group">
    <label for="email" class="control-label"> Email <br>
        <strong>{{ $alumno->email }}</strong>
    </label>
</div>

<!-- Teléfono -->
<div class="form-group">
    <label for="telefono" class="control-label"> telefono <br>
        <strong>{{ $alumno->telefono }}</strong>
    </label>
</div>


<br>
<!-- Cursos -->
<div class="form-group">
        <label for="cursos" class="control-label"> <h4>Cursos en los que está inscrito</h4>
    <table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Curso</th>
            <th>Maestro(a)</th>
            <th>Academia</th>
            <th>Dar de baja</th>
        </tr>
    </thead>

    <tbody>
        @foreach (App\Alumnos::find($alumno->id)->cursos as $curso)
        <tr>
            <td>  
                {{$curso->id}}
            </td>
            
            <td>
                {{$curso->nombre}}
            </td>
            
            <td> <!-- maestro -->
                @foreach (App\Cursos::find($curso->id)->maestros as $maestro)
                    {{$maestro->name}}
                @endforeach
            </td>

            <td> <!-- academia -->
                @foreach (App\Cursos::find($curso->id)->academias as $academia)
                    {{$academia->nombre}}
                @endforeach
            </td>

            <td> <!-- method post -->
                <form action="#" method="" style="display:inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
        
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Dar de baja al alumno?')">Baja</button>
        
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    

</table>
        </label>
    </div>

<a href="{{ url('alumnos')}}" class="btn btn-primary">Regresar</a>
<a href="{{ url('/alumnos/addCurso/'.$alumno->id) }}" class="btn btn-success">
    Agregar a curso
</a>
</div>
<center>
@endsection