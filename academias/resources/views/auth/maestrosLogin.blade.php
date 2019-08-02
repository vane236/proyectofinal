@extends('layouts.login')

@section('content')
<div class="login-box bg-info"> 
  <div class="login-logo">
    <a href="../../index2.html"><b>ACADEMIAS</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <strong><h4><p class="login-box-msg">Iniciar sesión como profesor</p></h4></strong>

    <form action="{{ route('maestros.login.submit') }}" method="post">
      {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         @if  ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @if  ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
            <a href="{{url('login')}}">Ingresar como administrador</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Acceder</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@endsection
