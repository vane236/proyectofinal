@extends('layouts.app2')

@section('content')

<div class="container">
<h2>Agregar a curso</h2>
<form action="{{ url('/alumnos/'.$alumno->id.'/addCurso') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <br>



    <!-- Telefono -->
    <br> 


    <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="Nombre completo" class="control-label"> {{'Nombre completo'}} </label>
                    <br>
                    <label for="nombre completo">
                        <strong>{{ $alumno->nombre.' '.$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno }}</strong>
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <select name="cursos_id" id="">
                    @foreach (App\Cursos::all() as $curso)
                        @foreach ($curso->maestros as $maestros)
                            {{$maestros_id = $maestros->pivot->maestros_id}}
                            {{$maestroNombre = App\Maestros::findOrFail($maestros_id)->name}}
                        @endforeach
                        @foreach ($curso->academias as $academias)
                            {{$academias_id = $academias->pivot->academias_id}}
                            {{$academiaNombre = App\Academias::findOrFail($academias_id)->nombre}}
                        @endforeach
                    <option value="{{$curso->id}}">{{ $curso->nombre.' - '.$maestroNombre.' - '.$academiaNombre}}</option>
                    @endforeach
                </select>
                <br><br>
            <center>
                <input type="submit" class="btn btn-success" value="Guardar">

                <a href="{{ url('alumnos')}}" class="btn btn-primary">Lista de alumnos</a>
            </center>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <!-- Foto -->
                <div class="form-group">
                    @if(isset($alumno->Foto))
                    <br>
                    <img src="{{ asset('storage').'/'.$alumno->Foto }}" class="img-thumbnail" alt="" width="200">
                    <br>
                    @endif                    
                </div>
            </div>
            
            <div class="col-md-4">


            </div>
            
          </div>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono" class="control-label"> {{'telefono'}} </label>
                    <br>
                    <label for="telefono">
                        <strong>{{ $alumno->telefono }}</strong>
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="control-label"> {{'email'}} </label>
                    <br>
                    <label for="email">
                        <strong>{{ $alumno->email }}</strong>
                    </label>
                </div>
            </div>
          </div>
    <br>



    
    
</form>

</div>


@endsection