@extends('layouts.app2')

@section('content')

<div class="container">


<br>

<div class="form-group">
    <label for="name" class="control-label"> name <br>
        {{ isset($usuario->name)?$usuario->name:old('name') }}
    </label>
</div>


<div class="form-group">
    <label for="email" class="control-label"> Email <br>
        {{ isset($usuario->email)?$usuario->email:old('email') }}    
    </label>
</div>

<!-- FOTO
<div class="form-group">
    <label for="Foto" class="control-label"> {{'Foto'}} </label>
    @if(isset($usuario->Foto))
    <br>
    <img src="{{ asset('storage').'/'.$usuario->Foto }}" class="img-thumbnail" alt="" width="200">
    <br>
    @endif
    <input class="form-control {{ $errors->has('Foto') ? 'is-invalid':''}}" type="file" name="Foto" id="Foto" value="">
    {!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
</div>
-->


<a href="{{ url('usuarios')}}" class="btn btn-primary">Regresar</a>

</div>

@endsection