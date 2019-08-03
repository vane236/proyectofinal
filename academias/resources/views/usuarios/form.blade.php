

<br>

<div class="form-group">
    <label for="name" class="control-label"> {{'Nombre'}} </label>
    <input class="form-control {{ $errors->has('name')?'is-invalid':''}}" type="text" name="name" id="name" 
    value="{{ isset($usuario->name)?$usuario->name:old('name') }}">

    {!! $errors->first('name','<div class="invalid-feedback">:message</div>') !!}
</div>
<br>

<div class="form-group">
    <label for="email" class="control-label"> {{'Email'}} </label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid':''}}" type="email" name="email" id="email" 
    value="{{ isset($usuario->email)?$usuario->email:old('email') }}">

    {!! $errors->first('email','<div class="invalid-feedback">:message - No puede ser vacío/Ya ha sido tomado</div>') !!}
</div>

<div class="form-group">
    <label for="password" class="control-label"> {{'Password'}} </label>
    <input class="form-control {{ $errors->has('password') ? 'is-invalid':''}}" type="password" name="password" id="password" 
    value="">

    {!! $errors->first('password','<div class="invalid-feedback">:message - No puede ser vacío/mínimo 8 caracteres/No coincide el password</div>') !!}
</div>

<div class="form-group">
    <label for="confirm_password" class="control-label"> {{'Confirmar password'}} </label>
    <input class="form-control {{ $errors->has('confirm_password') ? 'is-invalid':''}}" type="password" name="confirm_password" id="confirm_password" 
    value="">

    {!! $errors->first('confirm_password','<div class="invalid-feedback">:message - No puede ser vacío/mínimo 8 caracteres/No coincide el password</div>') !!}
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

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar Administrador' : 'Modificar Administrador' }}">


<a href="{{ url('usuarios')}}" class="btn btn-primary">Lista de Administradores</a>

