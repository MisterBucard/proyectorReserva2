@extends('viewMother')

@section('nombredepestana','reservas')

@section('cuerpodepagina')

@if(isset($reserva))
<h1 class="tituloM">Modificar Reserva</h1>
@else
<h1 class="tituloC">Crear una nueva Reserva</h1>
@endif
@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    @endif
</ul>
<form method="post" action=" {{ isset($reserva) ? route("reserva.update", ["id"=> $reserva->id]): route("reserva.store") }}">
    @csrf
    @if(isset($reserva))
    @method('put')
    @endif
    <br>
    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="fechaI" placeholder="" name="fechaI" value="{{ isset($reserva) ? $reserva->Fecha_Entrada: old("fechaI") }}" >
        <label for="fechaI">Fecha de Entrada</label>
    </div>
    <div class="form-floating">
    <input type="date" class="form-control" id="fechaF" placeholder="" name="fechaF" value="{{ isset($reserva) ? $reserva->Fecha_Salida: old("fechaF") }}" >
        <label for="fechaF">Fecha de Salida</label>
    </div>
    <br>
    <div class="form-floating">
    <input type="number" class="form-control" id="NumH" placeholder="ingrese el numero de personas" name="NumH" value="{{ isset($reserva) ? $reserva->Numero_de_Huespedes: old("NumH") }}" >
        <label for="NumH">Numero de Huespedes</label>
    </div>

    <label for="num">nombre del huesped</label>
    <select class="form-select" id="habitacion_id" class="form-control" name="Huesped_id" >
    <option  selected disabled>-- Seleccione una el huesped --</option>
    @foreach($huespeds as $huesped)
    <option value="{{ isset($huesped) ? $huesped->id: old("huesped_id") }}">{{ $huesped->nombre }}</option>
   @endforeach
    </select>

    <label for="">numero de habitacion</label>
    <select class="form-select" id="habitacion_id" class="form-control" name="Habitacion_id">
    <option  selected disabled>-- Seleccione una habitación --</option>
    @foreach($habitacions as $habitacion)
    <option value="{{ isset($habitacion) ? $habitacion->id: old("habitacion_id") }}">{{ $habitacion->Num_Habitacion }}</option>
   @endforeach
    </select>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-success" href="{{ route("reserva.index") }}" class="card-link">Volver al inicio</a>
    </div>
</form>
@endsection