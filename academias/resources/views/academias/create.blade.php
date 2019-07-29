@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Añadir academia
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Academias</a></li>
        <li class="active">Añadir academia</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h5 class="box-title">Favor de llenar los campos del formulario para añadir una academia</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="route('proveedores.store')" method="POST" >
              {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group">
                  <label >Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre de la academia" required>
                </div>
                
                <div class="form-group">
                  <label>Dirección</label>
                  <textarea name="direccion" class="form-control" placeholder="Dirección de la academia" cols="30" rows="6" required></textarea>
                </div>
                <div class="form-group">
                  <label >Teléfono</label>
                  <input type="text" name="telefono" class="form-control" placeholder="Telefono academia" required>
                </div>
                <div class="form-group">
                  <label >Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email academia" required>
                </div>
                <hr>
            
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center><button type="submit" class="btn btn-primary">Guardar datos</button></center>
              </div>
            </form>
          </div>
          <!-- /.box -->
          
          

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>   
@endsection
