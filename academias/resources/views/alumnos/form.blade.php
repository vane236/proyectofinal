
@if ($Modo == 'crear')
    <h2> Alta alumno </h2>
@else
    <h2> Editar datos del alumno </h2>
@endif

<br>

<div class="form-group">
    <label for="nombre" class="control-label"> {{'Nombre(s)'}} </label>
    <input class="form-control {{ $errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" id="nombre" 
    placeholder="Ingrese el(los) nombre(s)"
    value="{{ isset($alumno->nombre)?$alumno->nombre:old('nombre') }}">

    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <label for="apellidoPaterno" class="control-label"> {{'Apellido Paterno'}} </label>
    <input class="form-control {{ $errors->has('apellidoPaterno')?'is-invalid':''}}" type="text" name="apellidoPaterno" id="apellidoPaterno" 
    placeholder="Ingrese apellido paterno"
    value="{{ isset($alumno->apellidoPaterno)?$alumno->apellidoPaterno:old('apellidoPaterno') }}">

    {!! $errors->first('apellidoPaterno','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="apellidoMaterno" class="control-label"> {{'Apellido Materno'}} </label>
    <input class="form-control {{ $errors->has('apellidoMaterno')?'is-invalid':''}}" type="text" name="apellidoMaterno" id="apellidoMaterno" 
    placeholder="Ingrese apellido materno"
    value="{{ isset($alumno->apellidoMaterno)?$alumno->apellidoMaterno:old('apellidoMaterno') }}">

    {!! $errors->first('apellidoMaterno','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="telefono" class="control-label"> {{'Telefono'}} </label>
    <input class="form-control {{ $errors->has('telefono')?'is-invalid':''}}" type="text" name="telefono" id="telefono"
    placeholder="Ingrese teléfono"
    value="{{ isset($alumno->telefono)?$alumno->telefono:old('telefono') }}">

    {!! $errors->first('telefono','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="email" class="control-label"> {{'Email'}} </label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid':''}}" type="email" name="email" id="email" 
    placeholder="Ingrese email"
    value="{{ isset($alumno->email)?$alumno->email:old('email') }}">

    {!! $errors->first('email','<div class="invalid-feedback">:message - No puede ser vacío/Ya ha sido tomado</div>') !!}
</div>
<br>

<!-- Se selecciona un curso en caso de crear alumno -->
@if ($Modo == 'crear')
<label for="Curso">Selecciona curso</label><br>
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
@endif

<br><br>
<!-- Foto -->
<div class="form-group">
    <label for="Foto" class="control-label"> {{'Foto'}} </label>
    @if(isset($alumno->Foto))
    <br>
    <img src="{{ asset('storage').'/'.$alumno->Foto }}" class="img-thumbnail" alt="" width="200">
    <br>
    @endif
    <input class="form-control {{ $errors->has('Foto') ? 'is-invalid':''}}" type="file" name="Foto" id="Foto" value="">
    {!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
</div>


<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar alumno' : 'Modificar alumno' }}">


<a href="{{ url('alumnos')}}" class="btn btn-primary">Lista de alumnos</a>