<h2>Plataforma de Encuestas</h2>

<h4>Crear encuesta</h4>
<form method="post" action="index.php?app=surveys" class="mb-3">
    <input type="hidden" name="create" value="1">
    
    <div class="mb-2">
        <input name="title" class="form-control" placeholder="Título" required>
    </div>
    
    <div class="mb-2">
        <input name="options" class="form-control" placeholder="Opciones separadas por comas (Ej: Si, No, Tal vez)" required>
    </div>
    
    <button class="btn btn-primary">Crear</button>
</form>

---

<h4>Encuestas</h4>
<?php if (empty($surveys)): ?>
    <div class="alert alert-info">No hay encuestas.</div>
<?php else: ?>
    <?php foreach ($surveys as $s): ?>
        <div class="card mb-2">
            <div class="card-body">
                <h5><?= htmlspecialchars($s['title']) ?></h5>
                
                <form method="post" action="index.php?app=surveys">
                    <input type="hidden" name="id" value="<?= $s['id'] ?>">
                    
                    <?php foreach ($s['options'] as $i => $opt): ?>
                        <div class="form-check">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="choice" 
                                value="<?= $i ?>" 
                                id="opt<?= $s['id'] . $i ?>" 
                                <?= $i === 0 ? 'checked' : '' ?>
                            >
                            <label class="form-check-label" for="opt<?= $s['id'] . $i ?>">
                                <?= htmlspecialchars($opt) ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    
                    <button name="respond" class="btn btn-success mt-2">Responder</button>
                </form>

                <h6 class="mt-2">Resultados</h6>
                <ul>
                    <?php foreach ($s['options'] as $i => $opt): ?>
                        <li>
                            <?= htmlspecialchars($opt) ?>: <?= $s['results'][$i] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>