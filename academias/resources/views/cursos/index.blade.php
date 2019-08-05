
@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif



<a href="{{ url('cursos/create')}}" class="btn btn-success">Agregar curso</a>
<br>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>precio</th>
            <th>Maestro(s)</th>
            <th>Academia</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($cursos as $curso)
        <tr>
        <td> {{$curso->id}} </td>
        
        <td>{{$curso->nombre}}</td>        
        <td>{{'$'.$curso->precio}}</td>
        <td> <!-- Los maestros que impartesn este curso -->
            @foreach (App\Cursos::findOrFail($curso->id)->maestros as $maestro)
                {{$maestro->name}} <br>
            @endforeach                
        

        </td>
        <td> <!-- Las academia que imparte este curso-->
            @foreach(App\Cursos::find($curso->id)->academias as $academia)
                {{ $academia->nombre }}
            @endforeach
        </td>
        <td>
        
        <a href="{{ url('/cursos/'.$curso->id) }}" class="btn btn-primary">
            Detalles
        </a>
        <!--<a href="{{ url('/cursos/'.$curso->id.'/edit') }}" class="btn btn-warning">
            Editar
        </a>-->

        <form action="{{ url('/cursos/'.$curso->id) }}" method="post" style="display:inline">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

        </form>


        </td>
        </tr>
    </tbody>
    @endforeach

</table>

{{ $cursos->links() }}

</div>

@endsection