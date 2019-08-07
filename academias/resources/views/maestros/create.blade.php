@extends('layouts.app2')

@section('content')

<div class="container">

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        Existen datos incorrectos, verifique bien los campos
    </div>
@endif

<h3>Añadir maestro</h3>

<form action="{{url('maestros')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

    {{ csrf_field() }}

    @include('maestros.form', ['Modo'=>'crear'])

    
</form>

</div>

@endsection