@extends('viewMother')

@section('nombredepestana','Huespedes')

@section('cuerpodepagina')
@if(session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
</div>
@endif

<h1>Tabla de Huespedes  <a class="btn btn-primary" href="{{route('huesped.create')}}">Nuevo</a></h1>
<br>
<table class="table table-striped table-bordered">
    <thead class="thead-light">
        <tr> 
             <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">apellido</th>
            <th scope="col">correo electronico</th>
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>


        </tr>
    </thead>
    <tbody>

        @forelse($huespeds as $huesped)
        <tr>
            <th scope="row">{{ $huesped->id }}</th>
            <td>{{ $huesped->nombre }}</td>
            <td>{{$huesped->apellido }}</td>
            <td>{{$huesped->correo_electronico}}</td>
            <td><a class="btn btn-info" href="{{ route('huesped.show', ['id'=>$huesped->id])}}">Ver</a></td>
            <td><a class="btn btn-warning" href="{{ route('huesped.edit', ['id'=> $huesped->id])}}">Editar</a></td>
            <td>
             <!-- Modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmar{{$huesped->id}}">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalConfirmar{{$huesped->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿estas seguro que quieres eliminar el huesped con nombre: {{ $huesped->nombre}}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form method="post" action="{{ route("huesped.destroy", ['id'=> $huesped->id]) }}">
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
            <td colspan="4">no se encuentran registros de ningun huesped en esta tabla</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $huespeds->links() }}
