@extends('layouts.app2')

@section('content')

<div class="container">
<h4>Configuración de cuenta</h4>
<form action="{{ url('/maestros/'.$maestro->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    @include('maestros.form', ['Modo'=>'editar'])

    
</form>

</div>
@endsection