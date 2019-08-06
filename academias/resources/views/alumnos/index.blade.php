
@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif



<a href="{{ url('alumnos/create')}}" class="btn btn-success">Agregar alumno</a>
<br>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre completo</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Cursos</th>
            <th>Academias</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($alumnos as $alumno)
        <tr>
        <td> {{$alumno->id}} </td>
        
        <td>
            <img src="{{ asset('storage').'/'.$alumno->Foto }}" width="80px" height="80px" class="img-thumbnail" />
        </td>
        
        <td>{{$alumno->name.' '.$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno}}</td>        
        <td>{{$alumno->telefono}}</td>
        <td>{{$alumno->email}}</td>

        <td>
             
            
        </td>

        <td>
            
            
            
        </td>
        
        
        <td>
        
        <a href="{{ url('/alumnos/'.$alumno->id) }}" class="btn btn-primary">
            Detalles
        </a>
        <a href="{{ url('/alumnos/'.$alumno->id.'/edit') }}" class="btn btn-warning">
            Editar
        </a>

        <form action="{{ url('/alumnos/'.$alumno->id) }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

        </form>


        </td>
        </tr>
    </tbody>
    @endforeach

</table>

{{ $alumnos->links() }}

</div>

@endsection