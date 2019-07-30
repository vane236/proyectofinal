@extends('layouts.app')

@section('body')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Añadir curso
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Cursos</a></li>
        <li class="active">Añadir curso</li>
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
              <h5 class="box-title">Favor de llenar los campos del formulario para añadir un curso</h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="route('proveedores.store')" method="POST" >
              {!! csrf_field() !!}
              <div class="box-body">

                <div class="form-group">
                    <label >Academia</label>
                    <select>
                        <option value="volvo">Academia A</option>
                        <option value="saab">Academia B</option>
                        <option value="mercedes">Academia C</option>
                        <option value="audi">Academia D</option>
                    </select> 
                </div>

                <div class="form-group">
                    <label >Maestro</label>
                    <select>
                        <option value="volvo">Juan Pérez</option>
                        <option value="saab">Carlos Martinez</option>
                    </select> 
                </div>

                <div class="form-group">
                  <label >Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre de la academia" required>
                </div>
                
                <div class="form-group">
                  <label>Precio</label>
                  <input name="direccion" type="number" step="any" class="form-control" placeholder="Dirección de la academia"  required>
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
