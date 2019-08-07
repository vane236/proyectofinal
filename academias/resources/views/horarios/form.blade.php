

<br>

<div class="form-group">
    <label for="horaInicio" class="control-label"> {{'Hora inicio'}} </label>
    <input class="form-control {{ $errors->has('horaInicio')?'is-invalid':''}}"
    type="number" name="horaInicio" id="horaInicio" 
    placeholder="Ingresa la hora de inicio"
    value="{{ isset($horario->horaInicio)?$horario->horaInicio:old('horaInicio') }}">

    {!! $errors->first('horaInicio','<div class="invalid-feedback">:message - Sólo hay clases de 7 a.m a 18 p.m</div>') !!}
</div>
<br>

<div class="form-group">
    <label for="horaFin" class="control-label"> {{'Hora Fin'}} </label>
    <input class="form-control {{ $errors->has('horaFin')?'is-invalid':''}}" 
    type="number" name="horaFin" id="horaFin" 
    placeholder="Ingresa la hora de fin"
    value="{{ isset($horario->horaFin)?$horario->horaFin:old('horaFin') }}">

    {!! $errors->first('horaFin','<div class="invalid-feedback">:message - Sólo hay clases de 7 a.m a 18 p.m</div>') !!}
</div>



<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar horario' : 'Modificar horario' }}">


<a href="{{ url('horarios')}}" class="btn btn-primary">Lista de horarios</a>

