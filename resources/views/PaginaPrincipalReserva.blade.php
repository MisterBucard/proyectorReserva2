@extends('viewMother')

@section('nombredepestana','reservas')

@section('cuerpodepagina')
@if(session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif
<h1>Tabla de Reservas  <a class="btn btn-primary" href="{{route('reserva.create')}}">Nuevo</a></h1>
<br>
<table class="table table-striped table-bordered">
    <thead class="thead-light">
        <tr> 
             <th scope="col">id</th>
            <th scope="col">Fecha de Entrada</th>
            <th scope="col">Fecha de Salida</th>
            <th scope="col">Numero de Huespedes</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>


        </tr>
    </thead>
    <tbody>

        @forelse($reservas as $reserva)
        <tr>
            <th scope="row">{{ $reserva->id }}</th>
            <td>{{ $reserva->Fecha_Entrada }}</td>
            <td>{{$reserva->Fecha_Salida }}</td>
            <td>{{$reserva->Numero_de_Huespedes}}</td>
            <td><a class="btn btn-info" href="{{ route('reserva.show', ['id'=>$reserva->id])}}">Ver</a></td>
            <td><a class="btn btn-warning" href="{{ route('reserva.edit', ['id'=> $reserva->id])}}">Editar</a></td>
            <td>
             <!-- Modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmar{{$reserva->id}}">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalConfirmar{{$reserva->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿estas seguro que quieres eliminar la reserva con numero: {{ $reserva->id }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form method="post" action="{{ route("reserva.destroy", ['id'=> $reserva->id]) }}">
                                    @method("delete")
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">no se encuentran registros de ninguna reserva en esta tabla</td>
        </tr>
        @endforelse

    </tbody>
</table>
{{ $reservas->links() }}

@endsection