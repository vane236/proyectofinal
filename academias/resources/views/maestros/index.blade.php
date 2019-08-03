
@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif



<a href="{{ url('maestros/create')}}" class="btn btn-success">Agregar maestro</a>
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
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($maestros as $maestro)
        <tr>
        <td> {{$maestro->id}} </td>
        
        <td>
            <img src="{{ asset('storage').'/'.$maestro->Foto }}" width="100" height="80" class="img-thumbnail" />
        </td>
        
        <td>{{$maestro->name.' '.$maestro->apellidoPaterno.' '.$maestro->apellidoMaterno}}</td>        
        <td>{{$maestro->telefono}}</td>
        <td>{{$maestro->email}}</td>
        <td>
        
        <a href="{{ url('/maestros/'.$maestro->id) }}" class="btn btn-primary">
            Detalles
        </a>
        <!--<a href="{{ url('/maestros/'.$maestro->id.'/edit') }}" class="btn btn-warning">
            Editar
        </a>-->

        <form action="{{ url('/maestros/'.$maestro->id) }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

        </form>


        </td>
        </tr>
    </tbody>
    @endforeach

</table>

{{ $maestros->links() }}

</div>

@endsection