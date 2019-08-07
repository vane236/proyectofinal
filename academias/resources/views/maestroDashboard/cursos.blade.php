
@extends('layouts.app2')

@section('content')

<div class="container">

<br>
<h3>Cursos impartidos, lista de alumnos - clic en ver</h3>
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
            <a href="{{ url('maestroDashboard/verCurso/'.$curso->id)}}" class="btn btn-dark">Ver</a>
        </td>

        </tr>
    </tbody>
    @endforeach

</table>

<a href="{{ url('maestrosHome')}}" class="btn btn-primary">Regresar</a>

</div>

@endsection