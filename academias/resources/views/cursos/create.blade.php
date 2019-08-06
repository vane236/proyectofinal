@extends('layouts.app2')

@section('content')

<div class="container">

<!-- El curso ya está en esa academia - cursosControlles@store -->
@if(Session::has('Mensaje'))

<div class="alert alert-danger" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif


@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        Existen datos incorrectos, verifique bien los campos
        <ul>
          <li> {{$errors->all()[0]}} </li>
        </ul>
    </div>
@endif

<form action="{{url('cursos')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

    {{ csrf_field() }}

    @include('cursos.form', ['Modo'=>'crear'])

    
</form>

</div>

@endsection