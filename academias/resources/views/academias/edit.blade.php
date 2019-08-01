@extends('layouts.app2')

@section('content')

<div class="container">

<form action="{{ url('/academias/'.$academia->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    @include('academias.form', ['Modo'=>'editar'])

    
</form>

</div>
@endsection