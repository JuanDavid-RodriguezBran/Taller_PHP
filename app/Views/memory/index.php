<h2>Juego de Memoria</h2>
<p>Nivel simple: empareja números</p>

<div id="game" class="row"></div>
<button id="restart" class="btn btn-secondary mt-2">Reiniciar</button>

<script>
    function shuffle(a) { 
        for (let i = a.length - 1; i > 0; i--) { 
            const j = Math.floor(Math.random() * (i + 1)); 
            [a[i], a[j]] = [a[j], a[i]];
        } 
        return a;
    }

    function build() {
        const cards = shuffle([1, 1, 2, 2, 3, 3, 4, 4]);
        const container = document.getElementById('game'); 
        container.innerHTML = '';
        
        cards.forEach((n, idx) => {
            const cell = document.createElement('div'); 
            cell.className = 'col-3 p-2';
            cell.innerHTML = '<div class="card"><div class="card-body text-center"><button class="btn btn-light w-100" data-val="' + n + '">?</button></div></div>';
            container.appendChild(cell);
        });
    }

    let first = null, 
        second = null, 
        lock = false;

    document.addEventListener('click', function(e) {
        if (e.target.matches('#restart')) {
            build();
        }
        
        if (e.target.matches('#game button')) {
            if (lock) return;
            
            const btn = e.target; 
            btn.textContent = btn.dataset.val;
            
            if (!first) {
                first = btn;
            } else { 
                second = btn; 
                lock = true;
                
                if (first.dataset.val === second.dataset.val) { 
                    first.disabled = true; 
                    second.disabled = true; 
                    resetPair(); 
                } else { 
                    setTimeout(() => { 
                        first.textContent = '?'; 
                        second.textContent = '?'; 
                        resetPair(); 
                    }, 800); 
                }
            }
        }
    });

    function resetPair() { 
        first = null; 
        second = null; 
        lock = false; 
    }

    build();
</script>
