@extends('viewMother')

@section('nombredepestana','Habitaciones')

@section('cuerpodepagina')
@if(session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif

<h1>Tabla de habitaciones  <a class="btn btn-primary" href="{{route('habitacion.create')}}">Nuevo</a></h1>
<br>
<table class="table table-striped table-bordered">
    <thead class="thead-light">
        <tr> 
             <th scope="col">id</th>
            <th scope="col">Numero de habitacion</th>
            <th scope="col">Precio</th>
            <th scope="col">Tipo de habitacion</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>


        </tr>
    </thead>
    <tbody>

        @forelse($habitacions as $habitacion)
        <tr>
            <th scope="row">{{ $habitacion->id }}</th>
            <td>{{ $habitacion->Num_Habitacion }}</td>
            <td>{{$habitacion->Precio }}</td>
            <td>{{$habitacion->Tipo}}</td>
            <td><a class="btn btn-info" href="{{ route('habitacion.show', ['id'=>$habitacion->id])}}">Ver</a></td>
            <td><a class="btn btn-warning" href="{{ route('habitacion.edit', ['id'=> $habitacion->id])}}">Editar</a></td>
            <td>
             <!-- Modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmar{{$habitacion->id}}">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalConfirmar{{$habitacion->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿estas seguro que quieres eliminar la habitacion numero: {{ $habitacion->Num_Habitacion }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form method="post" action="{{ route("habitacion.destroy", ['id'=> $habitacion->id]) }}">
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
            <td colspan="4">no se encuentran registros de ninguna habitacion en esta tabla</td>
        </tr>
        @endforelse

    </tbody>
</table>
{{ $habitacions->links() }}
@endsection
