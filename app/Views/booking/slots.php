<h2>Disponibilidad para <?= htmlspecialchars($date) ?></h2>

<?php if (empty($available)): ?>
    <div class="alert alert-danger">No hay horarios disponibles para esta fecha.</div>
    <a href="index.php?app=booking" class="btn btn-secondary">Volver</a>
<?php else: ?>

<form method="post" action="index.php?app=booking&step=confirm">
    <input type="hidden" name="date" value="<?= $date ?>">

    <label>Seleccione un horario disponible:</label>
    <select name="slot" class="form-select mb-3" required>
        <?php foreach ($available as $slot): ?>
            <option value="<?= $slot ?>"><?= $slot ?></option>
        <?php endforeach; ?>
    </select>

    <label>Nombre del cliente:</label>
    <input class="form-control mb-3" name="name" required>

    <label>Servicio solicitado:</label>
    <input class="form-control mb-3" name="service" required>

    <button class="btn btn-success">Confirmar reserva</button>
</form>

<?php endif; ?>
