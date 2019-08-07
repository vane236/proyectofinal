


<br>

<div class="form-group">
    <label for="name" class="control-label"> {{'Nombre(s)'}} </label>
    <input class="form-control {{ $errors->has('name')?'is-invalid':''}}" type="text" name="name" id="name" 
    placeholder="Ingrese el(los) nombre(s)"
    value="{{ isset($maestro->name)?$maestro->name:old('name') }}">

    {!! $errors->first('name','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <label for="apellidoPaterno" class="control-label"> {{'Apellido Paterno'}} </label>
    <input class="form-control {{ $errors->has('apellidoPaterno')?'is-invalid':''}}" type="text" name="apellidoPaterno" id="apellidoPaterno" 
    placeholder="Ingrese apellido paterno"
    value="{{ isset($maestro->apellidoPaterno)?$maestro->apellidoPaterno:old('apellidoPaterno') }}">

    {!! $errors->first('apellidoPaterno','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="apellidoMaterno" class="control-label"> {{'Apellido Materno'}} </label>
    <input class="form-control {{ $errors->has('apellidoMaterno')?'is-invalid':''}}" type="text" name="apellidoMaterno" id="apellidoMaterno" 
    placeholder="Ingrese apellido materno"
    value="{{ isset($maestro->apellidoMaterno)?$maestro->apellidoMaterno:old('apellidoMaterno') }}">

    {!! $errors->first('apellidoMaterno','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="telefono" class="control-label"> {{'Telefono'}} </label>
    <input class="form-control {{ $errors->has('telefono')?'is-invalid':''}}" type="text" name="telefono" id="telefono"
    placeholder="Ingrese teléfono"
    value="{{ isset($maestro->telefono)?$maestro->telefono:old('telefono') }}">

    {!! $errors->first('telefono','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="email" class="control-label"> {{'Email'}} </label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid':''}}" type="email" name="email" id="email" 
    placeholder="Ingrese email"
    value="{{ isset($maestro->email)?$maestro->email:old('email') }}">

    {!! $errors->first('email','<div class="invalid-feedback">:message - No puede ser vacío/Ya ha sido tomado</div>') !!}
</div>

<!-- Si el Modo es editar-->
<br><br>
@if ($Modo == 'editar')
    <div class="alert alert-primary" role="alert">
        Si no desea modificar el password deje los campos vacíos.
    </div>
@endif

<div class="form-group">
    <label for="password" class="control-label"> {{'Password'}} </label>
    <input class="form-control {{ $errors->has('password') ? 'is-invalid':''}}" type="password" name="password" id="password" 
    placeholder="Ingrese password"
    value="">

    {!! $errors->first('password','<div class="invalid-feedback">:message - No puede ser vacío/mínimo 8 caracteres/No coincide el password</div>') !!}
</div>

<div class="form-group">
    <label for="confirm_password" class="control-label"> {{'Confirmar password'}} </label>
    <input class="form-control {{ $errors->has('confirm_password') ? 'is-invalid':''}}" type="password" name="confirm_password" id="confirm_password" 
    placeholder="Ingrese password nuevamente"
    value="">

    {!! $errors->first('confirm_password','<div class="invalid-feedback">:message - No puede ser vacío/mínimo 8 caracteres/No coincide el password</div>') !!}
</div>
<br>
<!-- Foto -->
<div class="form-group">
    <label for="Foto" class="control-label"> {{'Foto'}} </label>
    @if(isset($maestro->Foto))
    <br>
    <img src="{{ asset('storage').'/'.$maestro->Foto }}" class="img-thumbnail" alt="" width="200">
    <br>
    @endif
    <input class="form-control {{ $errors->has('Foto') ? 'is-invalid':''}}" type="file" name="Foto" id="Foto" value="">
    {!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
</div>

@if ($Modo == 'crear')
    <input type="submit" class="btn btn-success" value="{{'Agregar maestro' }}">    
@else
    <input type="submit" class="btn btn-success" value="{{'Actualizar datos' }}">
@endif

@if ($Modo == 'crear')
    <a href="{{ url('maestros')}}" class="btn btn-primary">Lista de maestros</a>
@else
    <a href="{{ url('maestrosHome')}}" class="btn btn-primary">Regresar</a>
@endif

    