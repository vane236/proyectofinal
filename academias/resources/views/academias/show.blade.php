@extends('layouts.app2')

@section('content')

<div class="container">

<center>
<br>

<div class="form-group">
    <label for="nombre" class="control-label"> Nombre <br>
        <strong>{{ isset($academia->nombre)?$academia->nombre:old('nombre') }}</strong>
    </label>
</div>


<div class="form-group">
    <label for="direccion" class="control-label"> Dirección <br>
        <strong>{{ isset($academia->direccion)?$academia->direccion:old('direccion') }}    </strong>
    </label>
    
</div>

<div class="form-group">
    <label for="telefono" class="control-label"> Teléfono <br>
        <strong>{{ isset($academia->telefono)?$academia->telefono:old('telefono') }}</strong>
    </label>
</div>

<div class="form-group">
    <label for="email" class="control-label"> Email <br>
        <strong>{{ isset($academia->email)?$academia->email:old('email') }}</strong>
    </label>
</div>

<div class="form-group">
    <label for="cursos" class="control-label"> Cursos que ofrece esta academia <br>
        <ul>
            @foreach ($academia->cursos as $curso)
                <li>
                    <a href="{{url('cursos/'.$curso->id)}}">{{$curso->nombre}}</a>
                </li>
            @endforeach
        </ul>
    </label>
</div>


<a href="{{ url('academias')}}" class="btn btn-primary">Academias</a>
</center>
</div>

@endsection