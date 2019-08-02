


@extends('layouts.maestroApp')

@section('maestroBody')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inicio
      </h1>
      <ol class="breadcrumb">
        <li><a href="/maestrosHome"><i class="fa fa-dashboard"></i> dashboard Maestros</a></li>
      </ol>
    </section>

    <br><br>
    <!-- Small boxes (Stat box) -->
    <div class="row-lg-12 col-lg-12">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
          <h3>2</h3>

            <p>Academias</p>
          </div>
          <div class="icon">
            <i class="fa fa-university"></i>
          </div>
          <a href="{{url('#')}}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
          <h3>4<sup style="font-size: 20px"></sup></h3>

            <p>Cursos</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="{{ url('#') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>65</h3>

            <p>Alumnos</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="{{ url('#') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- End stat boxes -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>   
@endsection