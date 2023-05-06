@extends('viewMother')

@section('nombredepestana','Huespeds')

@section('cuerpodepagina')
@if(isset($huesped))
<h1 class="tituloM">Modificar Huesped</h1>
@else
<h1 class="tituloC">Crear una nuevo Huesped</h1>
@endif
@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    @endif
</ul>
<form method="post" action=" {{ isset($huesped) ? route("huesped.update", ["id"=> $huesped->id]): route("huesped.store") }}">
    @csrf
    @if(isset($huesped))
    @method('put')
    @endif
    <br>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="name" placeholder="ingrese su nombre" name="nombre" value="{{ isset($huesped) ? $huesped->nombre: old("nombre") }}" required>
        <label for="name">Nombre</label>
    </div>
    <div class="form-floating">
    <input type="text" class="form-control" id="lastname" placeholder="ingrese su apellido" name="apellido" value="{{ isset($huesped) ? $huesped->apellido: old("apellido") }}" required>
        <label for="lastname">Apellido</label>
    </div>
    <br>
    <div class="form-floating">
    <input type="email" class="form-control" id="email" placeholder="ingrese su correo electronico" name="correo" value="{{ isset($huesped) ? $huesped->correo_electronico: old("correo") }}" required>
        <label for="email">Correo Electronico</label>
    </div>
    <br>
    <div class="form-floating">
    <input type="tel" class="form-control" id="tel" placeholder="ingrese su numero de telefono" name="telef" value="{{ isset($huesped) ? $huesped->telefono: old("telef") }}" required>
        <label for="tel">Telefono</label>
    </div>
 <br>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Guardar</button>
        
        <a href="{{ route("huesped.index") }}" class="btn btn-warning">Atrás</a>
    </div>
</form>
<br>
<a class="btn btn-success" href="{{ route("huesped.index") }}" class="card-link">Volver al inicio</a>
@endsection