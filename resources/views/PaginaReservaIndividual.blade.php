@extends('viewMother')

@section('nombredepestana', 'Reserva a detalle')

@section('cuerpodepagina')


<center>
    <h1 class="detalles">Detalles de la Reserva número {{ $reserva->id }} <a class="btn btn-warning" href="{{ route('reserva.edit', ['id' => $reserva->id]) }}">Editar</a></h1>
</center>
 <center>
<!-- Tabla de detalles de reserva -->
<div class="card" id="TdRe">
    <div class="card-body">
        <table class="table">
            <thead class="border border-primary">
                <tr>
                    <th scope="col">Campos</th>
                    <th scope="col">Valores</th>
                </tr>
            </thead>
            <tbody class="border border-primary">
                <tr>
                    <th scope="row">id</th>
                    <td>{{ $reserva->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Fecha de Entrada</th>
                    <td>{{ $reserva->Fecha_Entrada }}</td>
                </tr>
                <tr>
                    <th scope="row">Fecha de Salida</th>
                    <td>{{ $reserva->Fecha_Salida }}</td>
                </tr>
                <tr>
                    <th scope="row">Número de Huéspedes</th>
                    <td>{{ $reserva->Numero_de_Huespedes }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



    <!-- Botón de volver al inicio -->
    <br>
    <a id="btRI" class="btn btn-primary" href="{{ route('reserva.index') }}" class="card-link">Volver al inicio</a>
</center>

@endsection
