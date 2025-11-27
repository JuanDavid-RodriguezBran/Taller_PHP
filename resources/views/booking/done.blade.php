@extends('layout')

@section('content')
<h2>Reserva completada</h2>

<p class="alert alert-success">
    ¡La reserva fue realizada con éxito!
</p>

<a href="{{ route('booking.index') }}" class="btn btn-primary">
    Hacer otra reserva
</a>
@endsection
