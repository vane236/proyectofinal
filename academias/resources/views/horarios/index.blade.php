
@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif



<a href="{{ url('horarios/create')}}" class="btn btn-success">Agregar horario</a>
<br>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Hora inicio</th>
            <th>Hora Fin</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($horarios as $horario)
        <tr>
        <td> {{$horario->id}} </td>
        <!-- Foto
        <td>
            <img src="{{ asset('storage').'/'.$horario->Foto }}" width="100" height="80" class="img-thumbnail" />
        </td>
        -->
        <td>{{$horario->horaInicio}}</td>        
        <td>{{$horario->horaFin}}</td>
        
        
        <td>

        <form action="{{ url('/horarios/'.$horario->id) }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

        </form>
        </td>

        </tr>
    </tbody>
    @endforeach

</table>

{{ $horarios->links() }}

</div>

@endsection