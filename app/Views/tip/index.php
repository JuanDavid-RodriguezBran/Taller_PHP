<h2>Calculadora de Propinas</h2>

<form method="post" action="index.php?app=tip" class="mb-3">
    <div class="mb-3">
        <label>Monto</label>
        <input name="amount" type="number" step="0.01" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>% Propina</label>
        <input name="percent" type="number" step="0.1" class="form-control" value="10" required>
    </div>
    
    <button class="btn btn-primary">Calcular</button>
</form>

<?php if (!empty($result)): ?>
    <div class="card mt-3">
        <div class="card-body">
            <p>Monto: $<?= number_format($result['amount'], 2) ?></p>
            <p>Propina: $<?= number_format($result['tip'], 2) ?> (<?= $result['percent'] ?>%)</p>
            <p><strong>Total: $<?= number_format($result['total'], 2) ?></strong></p>
        </div>
    </div>
<?php endif; ?>