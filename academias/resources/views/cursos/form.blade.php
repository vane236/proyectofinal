


<br>

<!-- Academia -->
<div class="form-group">

    <h3>Añada un nuevo curso con su respectiva academia y maestro</h3>
    <br>
    <!-- Mensaje -->
    <div class="alert alert-primary" role="alert">
        Seleccione la academia, maestro y curso que desea relacionar
    </div>
        <label for="Academia">Academia</label>
    <select name="academias_id">
        @foreach (App\Academias::all() as $academia)
            <option value="{{$academia->id}}">{{$academia->nombre}}</option>
        @endforeach
        <option value="">seleccionar</option>
    </select> 

    {!! $errors->first('academias_id','<div class="invalid-feedback">:message - Puede ser que esta academia ya tenga este curso</div>') !!}

    <!-- Maestro -->
    <label for="Maestro(a)">Maestro(a)</label>
    <select name="maestros_id">
        @foreach (App\Maestros::all() as $maestro)
            <option value="{{$maestro->id}}">{{$maestro->name}}</option>
        @endforeach
        <option value="">Seleccionar</option>
    </select> 

    <label for="hola">
            {!! $errors->first('maestros_id','<div class="invalid-feedback">:message - Puede ser que esta academia ya tenga este curso</div>') !!}
    </label>


    <!-- Cursos -->
    <label for="Curso">Curso</label>
    <select name="cursos_id">
            <option value="seleccionar">Seleccione un curso</option>
        @foreach ($cursosNombres as $key => $value)
            <option value="{{$value}}">{{$key}}</option>
        @endforeach
    </select> 

    {!! $errors->first('curso_id','<div class="invalid-feedback">:message - Puede ser que esta academia ya tenga este curso</div>') !!}

</div>

    
<br>
<!-- Mensaje para los cursos -->
<div class="alert alert-primary" role="alert">
        Si el curso no se encuentra en la lista llene los siguientes campos
</div>

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



<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Añadir curso' : 'Modificar curso' }}">


<a href="{{ url('cursos')}}" class="btn btn-primary">Lista de cursos</a>


<br><br>
<label for="maestros">Si la academia no está en la lista puede agregarla <a href="{{url('academias/create')}}">aquí</a></label>
<br>
<label for="maestros">Si el maestro no está en la lista puede agregarlo <a href="{{url('maestros/create')}}">aquí</a></label>