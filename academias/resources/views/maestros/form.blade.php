


<br>

<div class="form-group">
    <label for="nombre" class="control-label"> {{'nombre'}} </label>
    <input class="form-control {{ $errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" id="nombre" 
    value="{{ isset($academia->nombre)?$academia->nombre:old('nombre') }}">

    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <label for="apellidoPaterno" class="control-label"> {{'apellidoPaterno'}} </label>
    <input class="form-control {{ $errors->has('apellidoPaterno')?'is-invalid':''}}" type="text" name="apellidoPaterno" id="apellidoPaterno" 
    value="{{ isset($academia->apellidoPaterno)?$academia->apellidoPaterno:old('apellidoPaterno') }}">

    {!! $errors->first('apellidoPaterno','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="telefono" class="control-label"> {{'telefono'}} </label>
    <input class="form-control {{ $errors->has('telefono')?'is-invalid':''}}" type="text" name="telefono" id="telefono"
    value="{{ isset($academia->telefono)?$academia->telefono:old('telefono') }}">

    {!! $errors->first('telefono','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="email" class="control-label"> {{'email'}} </label>
    <input class="form-control {{ $errors->has('email') ? 'is-invalid':''}}" type="email" name="email" id="email" 
    value="{{ isset($academia->email)?$academia->email:old('email') }}">

    {!! $errors->first('email','<div class="invalid-feedback">:message - No puede ser vacío/Ya ha sido tomado</div>') !!}
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

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar academia' : 'Modificar academia' }}">


<a href="{{ url('academias')}}" class="btn btn-primary">Lista de academias</a>