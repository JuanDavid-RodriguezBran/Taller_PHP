<h2>Lista de Tareas</h2>

<form method="post" action="index.php?app=todo" class="mb-3 d-flex">
    <input type="hidden" name="action" value="add">
    <input name="task" class="form-control me-2" placeholder="Nueva tarea..." required>
    <button class="btn btn-success">Agregar</button>
</form>

<?php if (empty($tasks)): ?>
    <div class="alert alert-info">No hay tareas.</div>
<?php else: ?>

<ul class="list-group">
<?php foreach ($tasks as $t): ?>

    <?php
        // colores por estado
        $color = match ($t['status']) {
            'pendiente' => 'secondary',
            'iniciada' => 'warning',
            'completada' => 'success',
            default => 'secondary'
        };
    ?>

    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
            <span class="badge bg-<?= $color ?> me-2"><?= ucfirst($t['status']) ?></span>
            <strong><?= htmlspecialchars($t['text']) ?></strong>
        </div>

        <div class="d-flex">
            <!-- Cambiar estado -->
            <form method="post" action="index.php?app=todo" class="me-2 d-flex">
                <input type="hidden" name="action" value="change_status">
                <input type="hidden" name="id" value="<?= $t['id'] ?>">

                <select name="status" class="form-select form-select-sm me-2">
                    <option value="pendiente"   <?= $t['status'] === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                    <option value="iniciada"    <?= $t['status'] === 'iniciada' ? 'selected' : '' ?>>Iniciada</option>
                    <option value="completada"  <?= $t['status'] === 'completada' ? 'selected' : '' ?>>Completada</option>
                </select>

                <button class="btn btn-primary btn-sm">Actualizar</button>
            </form>

            <!-- Eliminar -->
            <form method="post" action="index.php?app=todo">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $t['id'] ?>">
                <button class="btn btn-sm btn-danger">Eliminar</button>
            </form>
        </div>
    </li>

<?php endforeach; ?>
</ul>

<?php endif; ?>

