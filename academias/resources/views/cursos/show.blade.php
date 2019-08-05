@extends('layouts.app2')

@section('content')

<div class="container">


<br>

<div class="form-group">
    <label for="nombre" class="control-label"> Nombre <br>
        {{ isset($curso->nombre)?$curso->nombre:old('nombre') }}
    </label>
</div>


<div class="form-group">
    <label for="precio" class="control-label"> precio <br>
        {{ isset($curso->precio)?$curso->precio:old('precio') }}    
    </label>
</div>




<a href="{{ url('cursos')}}" class="btn btn-primary">Regresar</a>

</div>

@endsection