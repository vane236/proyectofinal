


<br>

<div class="form-group">
    <label for="pagoRealizado" class="control-label"> {{'Monto a pagar'}} </label>
    <input class="form-control {{ $errors->has('pagoRealizado')?'is-invalid':''}}" 
    type="number" step="0.01" min="0" max="1000000" name="pagoRealizado" id="pagoRealizado" 
    placeholder="Ingrese el monto a pagar ($MXN)"
    value="{{ isset($pago->pagoRealizado)?$pago->pagoRealizado:old('pagoRealizado') }}">

    {!! $errors->first('pagoRealizado','<div class="invalid-feedback">:message</div>') !!}
</div>


<input class="form-control" 
type="hidden" name="fecha" id="fecha" value="">

<input class="form-control" 
type="hidden" name="total" id="fecha" value="{{$total}}">

<input class="form-control {{ $errors->has('alumno_id') ? 'is-invalid':''}}" 
type="hidden" name="alumnos_id" id="alumnos_id" value="{{$alumno->id}}">

<br><br>
<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar pago' : 'Modificar pago' }}">


<a href="{{ url('pagos')}}" class="btn btn-primary">Lista de pagos</a>