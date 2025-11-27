@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Taller PHP - Dashboard</h1>

        <div class="list-group">
            <a href="{{ url('tareas') }}" class="list-group-item list-group-item-action">
                1. Lista de Tareas
            </a>

            <a href="{{ url('propinas') }}" class="list-group-item list-group-item-action">
                2. Calculadora de Propinas
            </a>

            <a href="{{ url('password') }}" class="list-group-item list-group-item-action">
                3. Generador de Contraseñas
            </a>

            <a href="{{ url('gastos') }}" class="list-group-item list-group-item-action">
                4. Gestor de Gastos
            </a>

            <a href="{{ url('reservas') }}" class="list-group-item list-group-item-action">
                5. Sistema de Reservas
            </a>

            <a href="{{ url('notas') }}" class="list-group-item list-group-item-action">
                6. Gestor de Notas
            </a>

            <a href="{{ url('calendario') }}" class="list-group-item list-group-item-action">
                7. Calendario de Eventos
            </a>

            <a href="{{ url('recetas') }}" class="list-group-item list-group-item-action">
                8. Plataforma de Recetas
            </a>

            <a href="{{ url('memoria') }}" class="list-group-item list-group-item-action">
                9. Juego de Memoria
            </a>

            <a href="{{ url('encuestas') }}" class="list-group-item list-group-item-action">
                10. Plataforma de Encuestas
            </a>

            <a href="{{ url('cronometro') }}" class="list-group-item list-group-item-action">
                11. Cronómetro Online
            </a>
        </div>
    </div>
@endsection
