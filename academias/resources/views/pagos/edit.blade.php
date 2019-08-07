@extends('layouts.app2')

@section('content')

<div class="container">

<form action="{{ url('/pagos/'.$pago->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    @include('pagos.form', ['Modo'=>'editar'])

    
</form>

</div>
@endsection