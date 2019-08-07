
@extends('layouts.maestroApp2')

@section('content')

<div class="container">

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        Existen datos incorrectos, el rango de calificación es de 0 a 100.
    </div>
@endif

<h3>Modificar calificación <br> curso: <strong>{{$datosCurso->nombre}}</strong>
</h3>

<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre completo</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>nueva alificación</th>
        </tr>
    </thead>

    <tbody>
        
            <tr>
            <td> {{$datosAlumno->id}} </td>
            
            <td>
                <img src="{{ asset('storage').'/'.$datosAlumno->Foto }}" width="80px" height="80px" class="img-thumbnail" />
            </td>
            
            <td><strong>{{$datosAlumno->nombre}}</strong> <br> {{$datosAlumno->apellidoPaterno.' '.$datosAlumno->apellidoMaterno}}</td>        
            <td>{{$datosAlumno->telefono}}</td>
            <td>{{$datosAlumno->email}}</td>

            <td> <!-- Cursos -->
                
            <form action="{{ url('/nuevaCalificacion/'.$datosCurso->id.'/'.$datosAlumno->id) }}" method="post" style="display:inline">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <input type="number" placeholder="Nueva calificacion" name="calificacion">
                <button class="btn btn-dark" type="submit" >Modificar</button>
            </form>
            
            </td>
            
            <td>
            

            </td>
            </tr>
        </tbody>

</table>

<br>
<center>
        <a href="{{ url('maestroDashboard/verCurso/'.$datosCurso->id)}}" class="btn btn-primary">Regresar</a>
</center>
</div>

@endsection