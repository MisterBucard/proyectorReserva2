@extends('viewMother')

@section('nombredepestana','Habitacion a detalle')

@section('cuerpodepagina')

<center>
    <h1 class="detalles">Detalles de la habitacion numero {{ $habitacion->Num_Habitacion }}  <a  class="btn btn-warning" href="{{route('habitacion.edit', ['id'=>$habitacion->id])}}">Editar</a></h1>
    <div class="card" id="TdHa">
        <div class="card-body">

            <table class="table">
                <thead class="border border-primary"">
                    <tr>
                        <th scope="col">Campos</th>
                        <th scope="col">Valores</th>
                    </tr>
                </thead>
                <tbody  class="border border-primary"">
                    <tr>
                        <th scope="row">id</th>
                        <td>{{ $habitacion->id }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Numero de Habitacion</th>
                        <td>{{ $habitacion->Num_Habitacion }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Precio</th>
                        <td>{{ $habitacion-> Precio }}</td>
                    </tr <tr>
                    <th scope="row">Tipo de habitacion</th>
                    <td>{{ $habitacion->Tipo }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div> 
    <br>
    <a class="btn btn-primary" href="{{ route("habitacion.index") }}" class="card-link">Volver al inicio</a>
</center>
@endsection