@extends('layouts.app2')

@section('content')

<div class="container">

<form action="{{ url('/alumnos/'.$alumno->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    @include('alumnos.form', ['Modo'=>'editar'])

    
</form>

</div>
@endsection