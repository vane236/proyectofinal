@extends('layouts.app2')

@section('content')

<div class="container">

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        Existen datos incorrectos, verifique bien los campos
    </div>
@endif

@if(Session::has('MensajeError'))
<div class="alert alert-danger" role="alert">
        {{ Session::get('MensajeError') }}
</div>
@endif


<h3>Añadir horario</h3>

<form action="{{url('horarios')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

    {{ csrf_field() }}

    @include('horarios.form', ['Modo'=>'crear'])

    
</form>

</div>

@endsection