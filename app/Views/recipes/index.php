<h2>Plataforma de Recetas</h2>

<form class="mb-3" method="get" action="index.php">
    <input type="hidden" name="app" value="recipes">
    
    <div class="row">
        <div class="col">
            <input name="q" class="form-control" placeholder="Buscar..." value="<?= htmlspecialchars($q) ?>">
        </div>
        <div class="col">
            <select name="filter" class="form-control">
                <option value="">Todos</option>
                <option value="Pasta">Pasta</option>
                <option value="Salad">Salad</option>
                <option value="Mexican">Mexican</option>
                <option value="Soup">Soup</option>
            </select>
        </div>
        <div class="col">
            <button class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>

---

<?php if (empty($recipes)): ?>
    <div class="alert alert-info">No se encontraron recetas.</div>
<?php else: ?>
    <div class="row">
        <?php foreach ($recipes as $r): ?>
            <div class="col-md-6">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5><?= htmlspecialchars($r['title']) ?></h5>
                        <p>Tipo: <?= $r['type'] ?></p>
                        <p>Ingredientes: <?= htmlspecialchars($r['ingredients']) ?></p>
                        
                        <form method="post" action="index.php?app=recipes">
                            <input type="hidden" name="id" value="<?= $r['id'] ?>">
                            <button name="favorite" class="btn btn-sm btn-outline-primary">
                                <?= in_array($r['id'], $favorites) ? '★ Favorito' : '☆ Guardar' ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>