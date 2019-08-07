@extends('layouts.app2')

@section('content')

<div class="container">

<center>
<br>

<div class="form-group">
    <label for="nombre" class="control-label"> Nombre <br>
        <strong>{{ isset($curso->nombre)?$curso->nombre:old('nombre') }}</strong>
    </label>
</div>


<div class="form-group">
    <label for="Precio" class="control-label"> Precio <br>
        <strong>{{ isset($curso->precio)?$curso->precio:old('precio') }}</strong>
    </label>
</div>

<div class="form-group">
    <label for="Maestro" class="control-label"> Maestro: <br>
        <ul>
        @foreach (App\Cursos::find($curso->id)->maestros as $maestro)
            <li><strong>{{$maestro->name.' '.$maestro->apellidoPaterno.' '.$maestro->apellidoMaterno}}</strong></li>
            <li><strong>{{$maestro->email}}</strong></li>
        @endforeach
    </ul>
    </label>
</div>


<div class="form-group">
        <label for="Academia" class="control-label"> Academia <br>
            @foreach (App\Cursos::find($curso->id)->academias as $academia)
                <strong>{{$academia->nombre}}</strong>               
            @endforeach
        </label>
    </div>


<a href="{{ url('cursos')}}" class="btn btn-primary">Cursos</a>

</center>
</div>

@endsection