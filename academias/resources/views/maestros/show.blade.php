@extends('layouts.app2')

@section('content')

<div class="container">

<center>
<br>
<!-- FOTO -->
<div class="form-group">
    @if(isset($maestro->Foto))
    <br>
    <img src="{{ asset('storage').'/'.$maestro->Foto }}" class="img-thumbnail" alt="" width="200">
    <br>
    @endif   
</div>


<div class="form-group">
    <label for="nombre" class="control-label"> Nombre <br>
        <strong>{{ $maestro->name.' '.$maestro->apellidoPaterno.' '.$maestro->apellidoMaterno}}</strong>
    </label>
</div>

<!-- Teléfono -->
<div class="form-group">
    <label for="telefono" class="control-label"> Teléfono <br>
        <strong>{{ isset($maestro->telefono)?$maestro->telefono:old('telefono') }}</strong>
    </label>
</div>

<!-- Email -->
<div class="form-group">
    <label for="email" class="control-label"> Email <br>
        <strong>{{ isset($maestro->email)?$maestro->email:old('email') }}</strong>
    </label>
</div>


<!-- Cursos y academias -->
<div class="form-group">
    <label for="email" class="control-label"> Cursos que imparte </label>
        <ul>
            @foreach (App\Maestros::find($maestro->id)->cursos as $curso)
            <li>
                <a href="{{url('cursos/'.$curso->id)}}">{{$curso->nombre}}</a> =>
                @foreach (App\Cursos::find($curso->id)->academias as $academia)
                  <a href="{{url('academias/'.$academia->id)}}">{{$academia->nombre}}</a>
                @endforeach
            </li>
            @endforeach
        </ul>
</div>


<a href="{{ url('maestros')}}" class="btn btn-primary">Maestros</a>

</center>
</div>

@endsection