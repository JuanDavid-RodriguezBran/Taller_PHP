<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Apps</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f7f7f7;
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #222;
            color: #fff;
            padding: 15px;
        }

        .sidebar a {
            display: block;
            padding: 8px 10px;
            margin-bottom: 6px;
            color: #ddd;
            text-decoration: none;
            border-radius: 4px;
        }

        .sidebar a:hover {
            background: #444;
            color: #fff;
        }

        .main {
            margin-left: 220px;
            padding: 20px;
        }

        .title {
            font-size: 20px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="title">Mini Apps</div>

        <a href="{{ url('/') }}">Inicio</a>
        <a href="{{ route('stopwatch.index') }}">Cronómetro</a>
        <a href="{{ route('memory.index') }}">Memoria</a>

        <a href="{{ route('notes.index') }}">Notas</a>
        <a href="{{ route('expenses.index') }}">Gastos</a>
        <a href="{{ route('recetas.index') }}">Recetas</a>
        <a href="{{ route('tareas.index') }}">Tareas</a>
        <a href="{{ route('calendar.index') }}">Calendario</a>

        <a href="{{ route('booking.index') }}">Reservas</a>
        <a href="{{ route('propinas.index') }}">Propinas</a>
        <a href="{{ route('encuestas.index') }}">Encuestas</a>
        <a href="{{ route('password.index') }}">Contraseñas</a>
    </div>

    <!-- CONTENIDO -->
    <div class="main">
        @yield('content')
    </div>

</body>
</html>

