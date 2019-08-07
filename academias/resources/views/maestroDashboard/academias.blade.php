@extends('layouts.maestroApp2')

@section('content')

<div class="container">

<center>
<br>
<h3>Academias en las que imparte clases:</h3>
<div class="form-group">
    <label for="nombre" class="control-label"> <br>
        <ul>
            @foreach (App\Maestros::find(Auth::user()->id)->cursos as $curso)
                @foreach (App\Cursos::find($curso->id)->academias as $academia)
                    {{$academia->nombre.' - '.$academia->direccion}}
                @endforeach
            @endforeach
        </ul>
    </label>
</div>



<a href="{{ url('maestrosHome')}}" class="btn btn-primary">HOME</a>
</center>
</div>

@endsection