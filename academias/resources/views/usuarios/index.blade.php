
@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif



<a href="{{ url('usuarios/create')}}" class="btn btn-success">Agregar usuario</a>
<br>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($users as $user)
        <tr>
        <td> {{$user->id}} </td>
        <!-- Foto
        <td>
            <img src="{{ asset('storage').'/'.$user->Foto }}" width="100" height="80" class="img-thumbnail" />
        </td>
        -->
        <td>{{$user->name}}</td>        
        <td>{{$user->email}}</td>
        <td>
        
        <a href="{{ url('/usuarios/'.$user->id) }}" class="btn btn-primary">
            Detalles
        </a>
        <!--
        <a href="{{ url('/usuarios/'.$user->id.'/edit') }}" class="btn btn-warning">
            Editar
        </a>
        -->

        <!--
        <form action="{{ url('/usuarios/'.$user->id) }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

        </form>
        -->


        </td>
        </tr>
    </tbody>
    @endforeach

</table>

{{ $users->links() }}

</div>

@endsection