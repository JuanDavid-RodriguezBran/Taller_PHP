@extends('layout')

@section('content')

<h2>Plataforma de Recetas</h2>

<form class="mb-3" method="GET" action="{{ route('recetas.index') }}">
    <div class="row">
        <div class="col">
            <input name="q" class="form-control" placeholder="Buscar..." value="{{ $q }}">
        </div>

        <div class="col">
            <select name="filter" class="form-control">
                <option value="">Todos</option>
                <option value="Pasta" {{ $filter === 'Pasta' ? 'selected' : '' }}>Pasta</option>
                <option value="Salad" {{ $filter === 'Salad' ? 'selected' : '' }}>Salad</option>
                <option value="Mexican" {{ $filter === 'Mexican' ? 'selected' : '' }}>Mexican</option>
                <option value="Soup" {{ $filter === 'Soup' ? 'selected' : '' }}>Soup</option>
            </select>
        </div>

        <div class="col">
            <button class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>

@if (empty($recipes))
    <div class="alert alert-info">No se encontraron recetas.</div>
@else
<div class="row">
    @foreach ($recipes as $r)
        <div class="col-md-6">
            <div class="card mb-2">
                <div class="card-body">
                    <h5>{{ $r['title'] }}</h5>
                    <p>Tipo: {{ $r['type'] }}</p>
                    <p>Ingredientes: {{ $r['ingredients'] }}</p>

                    <form method="POST" action="{{ route('recetas.favorite') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $r['id'] }}">

                        <button class="btn btn-sm btn-outline-primary">
                            {{ in_array($r['id'], $favorites) ? '★ Favorito' : '☆ Guardar' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif

@endsection
