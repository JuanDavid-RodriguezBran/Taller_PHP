<h2>Gestor de Gastos</h2>

<form method="post" action="index.php?app=expenses" class="mb-3">
    <input type="hidden" name="action" value="add">
    
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

---

<h4>Gastos</h4>

<?php if (empty($items)): ?>
    <div class="alert alert-info">Sin gastos.</div>
<?php else: ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cat</th>
                <th>Monto</th>
                <th>Desc</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $it): ?>
                <tr>
                    <td><?= $it['id'] ?></td>
                    <td><?= $it['date'] ?></td>
                    <td><?= htmlspecialchars($it['category']) ?></td>
                    <td><?= number_format($it['amount'], 2) ?></td>
                    <td><?= htmlspecialchars($it['desc']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

---

<h4>Resumen mensual</h4>

<?php if (empty($summary)): ?>
    <div class="alert alert-info">No hay resumen.</div>
<?php else: ?>
    <ul>
        <?php foreach ($summary as $m => $v): ?>
            <li><?= $m ?>: $<?= number_format($v, 2) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>