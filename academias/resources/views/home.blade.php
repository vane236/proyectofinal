@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inicio
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> dashboard</a></li>
      </ol>
    </section>

    <br><br>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>150</h3>

            <p>Academias</p>
          </div>
          <div class="icon">
            <i class="fa fa-university"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Cursos</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>

            <p>Maestros</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
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
          <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
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
