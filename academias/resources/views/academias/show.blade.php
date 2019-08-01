@extends('layouts.app2')

@section('content')

<div class="container">


<br>

<div class="form-group">
    <label for="nombre" class="control-label"> Nombre <br>
        {{ isset($academia->nombre)?$academia->nombre:old('nombre') }}
    </label>
</div>


<div class="form-group">
    <label for="direccion" class="control-label"> Dirección <br>
        {{ isset($academia->direccion)?$academia->direccion:old('direccion') }}    
    </label>
    
</div>

<div class="form-group">
    <label for="telefono" class="control-label"> Teléfono <br>
        {{ isset($academia->telefono)?$academia->telefono:old('telefono') }}    
    </label>
</div>

<div class="form-group">
    <label for="email" class="control-label"> Email <br>
        {{ isset($academia->email)?$academia->email:old('email') }}    
    </label>
</div>

<!-- FOTO
<div class="form-group">
    <label for="Foto" class="control-label"> {{'Foto'}} </label>
    @if(isset($academia->Foto))
    <br>
    <img src="{{ asset('storage').'/'.$academia->Foto }}" class="img-thumbnail" alt="" width="200">
    <br>
    @endif
    <input class="form-control {{ $errors->has('Foto') ? 'is-invalid':''}}" type="file" name="Foto" id="Foto" value="">
    {!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
</div>
-->


<a href="{{ url('academias')}}" class="btn btn-primary">Regresar</a>

</div>

@endsection