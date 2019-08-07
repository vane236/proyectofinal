
@extends('layouts.maestroApp2')

@section('content')

<div class="container">



<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre completo</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Calificación</th>
        </tr>
    </thead>

    <tbody>
    @foreach (App\Maestros::find(Auth::user()->id)->cursos as $curso)
        @foreach (App\Cursos::find($curso->id)->alumnos as $alumno)
            <tr>
            <td> {{$alumno->id}} </td>
            
            <td>
                <img src="{{ asset('storage').'/'.$alumno->Foto }}" width="80px" height="80px" class="img-thumbnail" />
            </td>
            
            <td><strong>{{$alumno->nombre}}</strong> <br> {{$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno}}</td>        
            <td>{{$alumno->telefono}}</td>
            <td>{{$alumno->email}}</td>

            <td> <!-- Cursos -->
                {{$curso->nombre}}
                
            </td>
            
            <td>
                {{$alumno->pivot->calificacion}}
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
    @endforeach

</table>

<br>
<center>
    <a href="{{ url('maestrosHome')}}" class="btn btn-primary">HOME</a> 
</center>
</div>

@endsection