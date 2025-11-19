<h2>Calendario de Eventos</h2>

<form method="post" action="index.php?app=calendar" class="mb-4">
    <input type="hidden" name="action" value="add">

    <label>Fecha:</label>
    <input type="date" name="date" class="form-control" required>

    <label>Hora:</label>
    <input type="time" name="time" class="form-control" required>

    <label>Título del evento:</label>
    <input type="text" name="title" class="form-control" required>

    <label>Recordatorio (fecha y hora):</label>
    <input type="datetime-local" name="reminder_time" class="form-control">

    <label>Texto del recordatorio:</label>
    <input type="text" name="reminder_text" class="form-control">

    <button class="btn btn-success mt-3">Crear evento</button>
</form>

<hr>

<h4>Eventos creados</h4>

<?php if (empty($events)): ?>
    <div class="alert alert-info">No hay eventos.</div>
<?php else: ?>

<table class="table table-bordered">
    <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Título</th>
        <th>Recordatorio</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($events as $e): ?>
        <tr>
            <td><?= $e['date'] ?></td>
            <td><?= $e['time'] ?></td>
            <td><?= htmlspecialchars($e['title']) ?></td>
            <td>
                <?php if (!empty($e['reminder_time'])): ?>
                    <?= $e['reminder_time'] ?><br>
                    <small><?= htmlspecialchars($e['reminder_text']) ?></small>
                <?php else: ?>
                    <em>Sin recordatorio</em>
                <?php endif; ?>
            </td>

            <td>
                <a class="btn btn-sm btn-primary" href="index.php?app=calendar&edit=<?= $e['id'] ?>">Editar</a>
                <a class="btn btn-sm btn-danger" href="index.php?app=calendar&delete=<?= $e['id'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?php endif; ?>

<script>
// Notificaciones (solo recordatorios vencidos)
setInterval(() => {
    <?php foreach ($events as $e): ?>
        <?php if (!empty($e['reminder_time'])): ?>
            if (new Date() >= new Date("<?= $e['reminder_time'] ?>")) {
                alert("Recordatorio: <?= addslashes($e['reminder_text']) ?>");
            }
        <?php endif; ?>
    <?php endforeach; ?>
}, 60000); // cada minuto
</script>
