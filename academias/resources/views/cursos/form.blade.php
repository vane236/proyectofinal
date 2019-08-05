


<br>

<!-- Academia -->
<div class="form-group">
        <label for="Academia">Academia</label>
    <select name="academias_id">
        @foreach (App\Academias::all() as $academia)
            <option value="{{$academia->id}}">{{$academia->nombre}}</option>
        @endforeach
    </select> 

    {!! $errors->first('academias_id','<div class="invalid-feedback">:message - Puede ser que esta academia ya tenga este curso</div>') !!}

    <label for="Maestro(a)">Maestro(a)</label>
    <select name="maestros_id">
        @foreach (App\Maestros::all() as $maestro)
            <option value="{{$maestro->id}}">{{$maestro->name}}</option>
        @endforeach
    </select> 

    {!! $errors->first('maestros_id','<div class="invalid-feedback">:message - Puede ser que esta academia ya tenga este curso</div>') !!}

</div>

<!-- Maestro -->

    


<div class="form-group">
    <label for="nombre" class="control-label"> {{'Nombre'}} </label>
    <input class="form-control {{ $errors->has('nombre')?'is-invalid':''}}" type="text" name="nombre" id="nombre" 
    placeholder="Ingrese nombre del curso"
    value="{{ isset($curso->nombre)?$curso->nombre:old('nombre') }}">

    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    <label for="precio" class="control-label"> {{'Precio'}} </label>
    <input class="form-control {{ $errors->has('precio')?'is-invalid':''}}" type="number" name="precio" id="precio" 
    placeholder="Ingrese precio"
    value="{{ isset($curso->precio)?$curso->precio:old('precio') }}">

    {!! $errors->first('precio','<div class="invalid-feedback">:message</div>') !!}
</div>



<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar curso' : 'Modificar curso' }}">


<a href="{{ url('cursos')}}" class="btn btn-primary">Lista de cursos</a>