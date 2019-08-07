
@extends('layouts.maestroApp2')

@section('content')

<div class="container">

        @if(Session::has('Mensaje'))

        <div class="alert alert-success" role="alert">
            {{ Session::get('Mensaje') }}
        </div>
        
        @endif
<h3>Lista de alumnos <br> curso: <strong>{{$datosCurso->nombre}}</strong></h3>
<br>

@foreach (App\Cursos::find($datosCurso->id)->horarios as $horario)
    <h4>Horario: Lunes a Viernes de <strong>{{$horario->horaInicio}} a {{$horario->horaFin}} hrs</strong></h4> 
@endforeach


<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre completo</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Calificación</th>
            <th>Estado</th>
        </tr>
    </thead>

    <tbody>
    
        @foreach (App\Cursos::find($datosCurso->id)->alumnos as $alumno)
            <tr>
            <td> {{$alumno->id}} </td>
            
            <td>
                <img src="{{ asset('storage').'/'.$alumno->Foto }}" width="80px" height="80px" class="img-thumbnail" />
            </td>
            
            <td><strong>{{$alumno->nombre}}</strong> <br> {{$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno}}</td>        
            <td>{{$alumno->telefono}}</td>
            <td>{{$alumno->email}}</td>

            <td> <!-- Cursos -->
                {{$alumno->pivot->calificacion}}
            </td>
            
            <td>
                @if ($alumno->pivot->calificacion >= 70)
                    Aprobado
                @else
                    Reprobado
                @endif
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
            <a href="{{ url('/modificarCalificacion/'.$datosCurso->id.'/'.$alumno->id)}}" class="btn btn-dark">Modificar</a>
     
            <!--
            <form action="{{ url('/alumnos/'.$alumno->id) }}" method="post" style="display:inline">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <button class="btn btn-dark" type="submit" >Calificación</button>

            </form>
            -->


            </td>
            </tr>
        </tbody>
        @endforeach

</table>

<br>
<center>
    <a href="{{ url('maestroDashboard/cursos')}}" class="btn btn-primary">Regresar</a>
</center>
</div>

@endsection