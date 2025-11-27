@extends('layout')

@section('content')
<h2>Disponibilidad para {{ $date }}</h2>

@if(empty($available))
    <div class="alert alert-danger">No hay horarios disponibles para esta fecha.</div>
    <a href="{{ route('booking.index') }}" class="btn btn-secondary">Volver</a>
@else
<form method="post" action="{{ route('booking.confirm') }}">
    @csrf

    <input type="hidden" name="date" value="{{ $date }}">

    <label>Seleccione un horario disponible:</label>
    <select name="slot" class="form-select mb-3" required>
        @foreach ($available as $slot)
            <option value="{{ $slot }}">{{ $slot }}</option>
        @endforeach
    </select>

    <label>Nombre del cliente:</label>
    <input class="form-control mb-3" name="name" required>

    <label>Servicio solicitado:</label>
    <input class="form-control mb-3" name="service" required>

    <button class="btn btn-success">Confirmar reserva</button>
</form>
@endif
@endsection
