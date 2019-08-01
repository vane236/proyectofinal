
@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif



<a href="{{ url('academias/create')}}" class="btn btn-success">Agregar academia</a>
<br>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($academias as $academia)
        <tr>
        <td> {{$academia->id}} </td>
        <!-- Foto
        <td>
            <img src="{{ asset('storage').'/'.$academia->Foto }}" width="100" height="80" class="img-thumbnail" />
        </td>
        -->
        <td>{{$academia->nombre}}</td>        
        <td>{{$academia->direccion}}</td>
        <td>{{$academia->telefono}}</td>
        <td>{{$academia->email}}</td>
        <td>
        
        <a href="{{ url('/academias/'.$academia->id) }}" class="btn btn-primary">
            Detalles
        </a>
        <a href="{{ url('/academias/'.$academia->id.'/edit') }}" class="btn btn-warning">
            Editar
        </a>

        <form action="{{ url('/academias/'.$academia->id) }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

        </form>


        </td>
        </tr>
    </tbody>
    @endforeach

</table>

{{ $academias->links() }}

</div>

@endsection