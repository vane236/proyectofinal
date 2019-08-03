@extends('layouts.app2')

@section('content')

<div class="container">


<br>

<div class="form-group">
    <label for="nombre" class="control-label"> Nombre <br>
        {{ isset($maestro->name)?$maestro->name:old('name') }}
    </label>
</div>


<div class="form-group">
    <label for="email" class="control-label"> Email <br>
        {{ isset($maestro->email)?$maestro->email:old('email') }}    
    </label>
</div>

<!-- FOTO -->
<div class="form-group">
    <label for="Foto" class="control-label"> {{'Foto'}} </label>
    @if(isset($maestro->Foto))
    <br>
    <img src="{{ asset('storage').'/'.$maestro->Foto }}" class="img-thumbnail" alt="" width="200">
    <br>
    @endif   
</div>



<a href="{{ url('maestros')}}" class="btn btn-primary">Regresar</a>

</div>

@endsection