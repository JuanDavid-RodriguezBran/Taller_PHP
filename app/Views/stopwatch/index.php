<h2>Cronómetro Online</h2>

<div>
    <h3 id="time">00:00:00.000</h3>
    
    <button id="start" class="btn btn-success">Iniciar</button>
    <button id="pause" class="btn btn-warning">Pausa</button>
    <button id="reset" class="btn btn-danger">Reiniciar</button>
    <button id="lap" class="btn btn-secondary">Vuelta</button>
</div>

<ul id="laps" class="mt-2"></ul>

<script>
    let startTime = 0, 
        elapsed = 0, 
        timer = null;

    // Función para formatear el tiempo (milisegundos a HH:MM:SS.mmm)
    function fmt(t) { 
        let ms = t % 1000; 
        t = (t - ms) / 1000; 
        let s = t % 60; 
        t = (t - s) / 60; 
        let m = t % 60; 
        let h = (t - m) / 60; 
        
        return String(h).padStart(2, '0') + ':' + 
               String(m).padStart(2, '0') + ':' + 
               String(s).padStart(2, '0') + '.' + 
               String(ms).padStart(3, '0');
    }

    // Manejador del botón INICIAR
    document.getElementById('start').addEventListener('click', () => {
        if (!timer) { 
            startTime = Date.now() - elapsed; 
            
            timer = setInterval(() => { 
                elapsed = Date.now() - startTime; 
                document.getElementById('time').textContent = fmt(elapsed); 
            }, 10); // Actualiza cada 10ms (centésimas de segundo)
        }
    });

    // Manejador del botón PAUSA
    document.getElementById('pause').addEventListener('click', () => { 
        if (timer) { 
            clearInterval(timer); 
            timer = null; 
        }
    });

    // Manejador del botón REINICIAR
    document.getElementById('reset').addEventListener('click', () => { 
        clearInterval(timer); 
        timer = null; 
        elapsed = 0; 
        document.getElementById('time').textContent = fmt(0); 
        document.getElementById('laps').innerHTML = ''; 
    });

    // Manejador del botón VUELTA (LAP)
    document.getElementById('lap').addEventListener('click', () => { 
        let li = document.createElement('li'); 
        li.textContent = document.getElementById('time').textContent; 
        document.getElementById('laps').appendChild(li); 
    });
</script>