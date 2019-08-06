@extends('layouts.app2')

@section('content')

<div class="container">


<br>

<div class="form-group">
    <label for="nombre" class="control-label"> Nombre <br>
        {{ isset($alumno->nombre)?$alumno->nombre:old('nombre') }}
    </label>
</div>


<div class="form-group">
    <label for="email" class="control-label"> Email <br>
        {{ isset($alumno->email)?$alumno->email:old('email') }}    
    </label>
</div>

<div class="form-group">
    <label for="telefono" class="control-label"> telefono <br>
        {{ isset($alumno->telefono)?$alumno->telefono:old('telefono') }}    
    </label>
</div>


<!-- FOTO -->
<div class="form-group">
    <label for="Foto" class="control-label"> {{'Foto'}} </label>
    @if(isset($alumno->Foto))
    <br>
    <img src="{{ asset('storage').'/'.$alumno->Foto }}" class="img-thumbnail" alt="" width="200">
    <br>
    @endif   
</div>



<a href="{{ url('alumnos')}}" class="btn btn-primary">Regresar</a>

</div>

@endsection