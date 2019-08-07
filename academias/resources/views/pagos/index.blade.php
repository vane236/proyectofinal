
@extends('layouts.app2')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif



<h3>Pagos Realizados Cuatrimestre Mayo - Agosto 2019</h3>
<br>
<br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre completo</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Cursos</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($alumnos as $alumno)
        <tr>
        <td> {{$alumno->id}} </td>
        
        <td>
            <img src="{{ asset('storage').'/'.$alumno->Foto }}" width="80px" height="80px" class="img-thumbnail" />
        </td>
        
        <td><strong>{{$alumno->nombre}}</strong> <br> {{$alumno->apellidoPaterno.' '.$alumno->apellidoMaterno}}</td>        
        <td>{{$alumno->telefono}}</td>
        <td>{{$alumno->email}}</td>

        <td> <!-- Cursos -->
            @php
                $total = 0
            @endphp
            @foreach (App\Alumnos::find($alumno->id)->cursos as $curso)
                {{$curso->nombre . ' - '}}
                @php
                    $total += $curso->precio
                @endphp
                @foreach (App\Cursos::find($curso->id)->academias as $academia)
                    {{$academia->nombre}}
                @endforeach
                <br>
            @endforeach
            <br>
        </td>
        
        
        <td>
            
            @php
                $cantidad = 0
            @endphp

            @foreach (App\Alumnos::find($alumno->id)->pagos as $pago)
                @php
                    $cantidad += $pago->pagoRealizado
                @endphp
            @endforeach
            @if ($cantidad >= $total) <!-- Si ya fue pagado-->
                PAGADO
            @else
                <a href="{{ url('/pagos/create/'.$alumno->id.'/'.$total) }}" class="btn btn-primary">
                    Realizar Pago
                </a>
            @endif
            <a href="{{ url('/pagos/'.$alumno->id) }}" class="btn btn-dark">
                Ver
            </a>
            
            <br><br>
            Total a pagar: <strong>${{$total}}</strong> <br>
            Pagado: <strong>${{$cantidad}}</strong>
        </td>

        </tr>
    </tbody>
    @endforeach

</table>

{{ $alumnos->links() }}

</div>

@endsection