@extends('layout')

@section('content')
<h2>Sistema de Reservas</h2>

<form method="post" action="{{ route('booking.slots') }}" class="mb-3">
    @csrf

    <label>Seleccione una fecha:</label>
    <input type="date" name="date" class="form-control" required>

    <button class="btn btn-primary mt-3">Buscar disponibilidad</button>
</form>
@endsection
