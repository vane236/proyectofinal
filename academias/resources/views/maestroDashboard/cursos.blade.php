
@extends('layouts.maestroApp2')

@section('content')

<div class="container">

    @php
        $cantidadCursos = sizeof(App\Maestros::find(Auth::user()->id)->cursos);
    @endphp
    
        
    

<br>
<h3>Cursos impartidos: <strong>{{$cantidadCursos}}</strong></h3>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Academia</th>
            <th>Cantidad de alumnos</th>
        </tr>
    </thead>

    <tbody>
    @foreach (App\Maestros::find(Auth::user()->id)->cursos as $curso)
        <tr>
        <td> {{$curso->id}} </td>
        
        <td>{{$curso->nombre}}</td>        
        
        <td> <!-- Las academia que imparte este curso-->
            @foreach(App\Cursos::find($curso->id)->academias as $academia)
                {{ $academia->nombre }}
            @endforeach
        </td>

        <td><!-- La cantidad de alumnos que tiene el curso -->
            @php
                echo sizeof(App\Cursos::find($curso->id)->alumnos);
            @endphp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
            <a href="{{ url('maestroDashboard/verCurso/'.$curso->id)}}" class="btn btn-dark">Ver alumnos</a>
        </td>

        </tr>
    </tbody>
    @endforeach

</table>

<center>
    <a href="{{ url('maestrosHome')}}" class="btn btn-primary">HOME</a>
</center>

</div>

@endsection