<h2>Gestor de Notas</h2>

<form method="post" action="index.php?app=notes" class="mb-3">
    <input type="hidden" name="action" value="add">
    
    <div class="mb-2">
        <input name="title" class="form-control" placeholder="Título" required>
    </div>
    
    <div class="mb-2">
        <input name="category" class="form-control" placeholder="Categoría">
    </div>
    
    <div class="mb-2">
        <textarea name="content" class="form-control" placeholder="Contenido" rows="4" required></textarea>
    </div>
    
    <button class="btn btn-success">Guardar Nota</button>
</form>

---

<?php if (empty($notes)): ?>
    <div class="alert alert-info">No hay notas.</div>
<?php else: ?>
    <div class="list-group">
        <?php foreach ($notes as $n): ?>
            <a class="list-group-item list-group-item-action" href="#">
                <h5><?= htmlspecialchars($n['title']) ?></h5>
                <small><?= htmlspecialchars($n['category']) ?></small>
                <p><?= nl2br(htmlspecialchars($n['content'])) ?></p>
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>