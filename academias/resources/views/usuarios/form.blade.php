

<br>

<div class="form-group">
    <label for="name" class="control-label"> {{'name'}} </label>
    <input class="form-control {{ $errors->has('name')?'is-invalid':''}}" type="text" name="name" id="name" 
    value="{{ isset($usuario->name)?$usuario->name:old('name') }}">

    {!! $errors->first('name','<div class="invalid-feedback">:message</div>') !!}
</div>
<br>

<div class="form-group">
    <label for="email" class="control-label"> {{'email'}} </label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid':''}}" type="email" name="email" id="email" 
    value="{{ isset($usuario->email)?$usuario->email:old('email') }}">

    {!! $errors->first('email','<div class="invalid-feedback">:message - No puede ser vacío/Ya ha sido tomado</div>') !!}
</div>

<div class="form-group">
    <label for="password" class="control-label"> {{'password'}} </label>
    <input class="form-control {{ $errors->has('password') ? 'is-invalid':''}}" type="password" name="password" id="password" 
    value="{{ isset($usuario->password)?$usuario->password:old('password') }}">

    {!! $errors->first('password','<div class="invalid-feedback">:message - No puede ser vacío/Ya ha sido tomado</div>') !!}
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

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar usuario' : 'Modificar usuario' }}">


<a href="{{ url('usuarios')}}" class="btn btn-primary">Lista de usuarios</a>

