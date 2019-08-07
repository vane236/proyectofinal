@extends('layouts.app2')

@section('content')

<div class="container">


<br>

<div class="form-group">
    <label for="horaInicio" class="control-label"> Hora inicio <br>
        {{ isset($horario->horaInicio)?$horario->horaInicio:old('horaInicio') }}
    </label>
</div>



<div class="form-group">
    <label for="horaFin" class="control-label"> Hora fin <br>
        {{ isset($horario->horaFin)?$horario->horaFin:old('horaFin') }}    
    </label>
</div>


<a href="{{ url('horarios')}}" class="btn btn-primary">Regresar</a>

</div>

@endsection