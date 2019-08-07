@extends('layouts.app2')

@section('content')

<div class="container">

<h3>Pagos realizados por el alumno(a): {{$alumno->nombre.' '.$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno}}</h3>

<br>

<table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <th>Fecha</th>
                <th>Cantidad pagada</th>
            </tr>
        </thead>
    
        <tbody>
            @php
                $total = 0
            @endphp
            @foreach (App\Alumnos::find($alumno->id)->pagos as $pago)
                <tr>
                <td> {{$pago->fecha}} </td>
                
            
                <td>{{$pago->pagoRealizado}}</td>
                @php
                    $total += $pago->pagoRealizado;
                @endphp

                </tr>
            @endforeach
            
        </tbody>
        
    
    </table>

    <br>
    <h4>Total pagado: </h4> <h5><strong>${{$total}}</strong></h5>
<br>
<a href="{{ url('pagos')}}" class="btn btn-primary">Regresar</a>

</div>

@endsection