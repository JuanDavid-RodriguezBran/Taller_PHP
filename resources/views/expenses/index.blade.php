@extends('layout')

@section('content')

<h2>Gestor de Gastos</h2>

<form method="POST" action="{{ route('expenses.store') }}" class="mb-3">
    @csrf

    <div class="row">
        <div class="col">
            <label>Fecha</label>
            <input name="date" type="date" class="form-control" required>
        </div>

        <div class="col">
            <label>Categoría</label>
            <input name="category" class="form-control" required>
        </div>

        <div class="col">
            <label>Monto</label>
            <input name="amount" type="number" step="0.01" class="form-control" required>
        </div>
    </div>

    <div class="mb-2">
        <label>Descripción</label>
        <input name="desc" class="form-control">
    </div>

    <button class="btn btn-success">Agregar Gasto</button>
</form>

<hr>

<h4>Gastos</h4>

@if (empty($items))
    <div class="alert alert-info">Sin gastos.</div>
@else
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Categoría</th>
                <th>Monto</th>
                <th>Descripción</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $it)
                <tr>
                    <td>{{ $it['id'] }}</td>
                    <td>{{ $it['date'] }}</td>
                    <td>{{ $it['category'] }}</td>
                    <td>{{ number_format($it['amount'], 2) }}</td>
                    <td>{{ $it['desc'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<hr>

<h4>Resumen mensual</h4>

@if (empty($summary))
    <div class="alert alert-info">No hay resumen.</div>
@else
    <ul>
        @foreach ($summary as $m => $v)
            <li>{{ $m }}: ${{ number_format($v, 2) }}</li>
        @endforeach
    </ul>
@endif

@endsection
