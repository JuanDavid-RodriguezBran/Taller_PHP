<?php
$path = $GLOBALS['path'] ?? null;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mi Proyectico - MVC PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 80vh
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-3 bg-light p-3 sidebar">
                <h4>Mini Apps MVC</h4>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=tip">1. Calculadora de Propinas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=todo">2. Lista de Tareas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=password">3. Generador de Contraseñas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=expenses">4. Gestor de Gastos</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=booking">5. Sistema de Reservas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=notes">6. Gestor de Notas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=calendar">7. Calendario de Eventos</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=recipes">8. Plataforma de Recetas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=memory">9. Juego de Memoria</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=surveys">10. Plataforma de Encuestas</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?app=stopwatch">11. Cronómetro Online</a></li>
                </ul>
            </nav>
            <main class="col-9 p-4">
                <?php
                if ($path && file_exists($path)) {
                    include $path;
                } else {
                    echo '<h2>Bienvenido — selecciona una app en la barra lateral</h2>';
                }
                ?>
            </main>
        </div>
    </div>
</body>
</html>