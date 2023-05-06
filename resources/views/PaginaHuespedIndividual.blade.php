@extends('viewMother')

@section('nombredepestana','Informacion  del Huesped')

@section('cuerpodepagina')

<center>
    <h1 class="detalles">Detalles de {{ $huesped->nombre }}  <a  class="btn btn-warning" href="{{route('huesped.edit', ['id'=>$huesped->id])}}">Editar</a></h1>
    <div class="card" id="TdHu">
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
                        <td>{{ $huesped->id }} </td>
                    </tr>
                    <tr>
                        <th scope="row">nombre</th>
                        <td>{{ $huesped->nombre }}</td>
                    </tr>
                    <tr>
                        <th scope="row">apellido</th>
                        <td>{{ $huesped->apellido }}</td>
                    </tr
                     <tr>
                    <th scope="row">correo electronico</th>
                    <td>{{ $huesped->correo_electronico }}</td>
                    </tr>
                    <tr>
                    <th scope="row">numero de telefono</th>
                    <td>{{ $huesped->telefono }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div> 
    <br>
    <a class="btn btn-primary" href="{{ route("huesped.index") }}" class="card-link">Volver al inicio</a>
</center>
@endsection