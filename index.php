<!DOCTYPE html>
<html>

<head>
    <title>Calculadoras</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agregamos Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    :root {
        --primary-color: #39FF14;
        --secondary-color: #FFFFFF;
        --bg-dark: #0a0a0a;
        --text-light: #ffffff;
        --card-bg: #1a1a1a;
        --neon-shadow: 0 0 20px rgba(57, 255, 20, 0.5);
        --neon-text: 0 0 10px rgba(57, 255, 20, 0.8);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, var(--bg-dark), #000);
        color: var(--text-light);
        font-family: 'Segoe UI', Arial, sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* Efecto de líneas de fondo */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: repeating-linear-gradient(transparent 0%,
                rgba(138, 43, 226, 0.05) 1px,
                transparent 2px,
                transparent 30px);
        pointer-events: none;
        z-index: -1;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        position: relative;
    }

    /* Título con efecto de glitch */
    h1 {
        text-align: center;
        font-size: 3.5rem;
        margin: 2rem 0;
        position: relative;
        text-transform: uppercase;
        color: var(--primary-color);
        text-shadow:
            0 0 5px var(--primary-color),
            0 0 10px var(--primary-color),
            0 0 20px var(--primary-color);
        animation: neonPulse 1.5s infinite alternate;
    }

    @keyframes neonPulse {
        from {
            text-shadow:
                0 0 5px var(--primary-color),
                0 0 10px var(--primary-color),
                0 0 20px var(--primary-color);
        }

        to {
            text-shadow:
                0 0 5px var(--primary-color),
                0 0 20px var(--primary-color),
                0 0 40px var(--primary-color);
        }
    }

    .nav {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin: 4rem 0;
        padding: 0 1rem;
    }

    .calculator-card {
        position: relative;
        background: var(--card-bg);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.5s ease;
        min-height: 250px;
        cursor: pointer;
        border: 2px solid var(--primary-color);
        box-shadow: 0 0 15px var(--primary-color);
        animation: borderGlow 2s infinite alternate;
        background-clip: padding-box;
    }

    .calculator-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: conic-gradient(from 0deg,
                transparent 0%,
                var(--primary-color) 25%,
                var(--secondary-color) 50%,
                transparent 75%);
        animation: rotate 4s linear infinite;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
        border-radius: 24px;
    }

    .calculator-card:hover::before {
        opacity: 1;
    }

    .card-content {
        position: relative;
        background: var(--card-bg);
        margin: 2px;
        padding: 2rem;
        border-radius: 20px;
        z-index: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .calculator-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .calculator-card:hover .calculator-icon {
        transform: scale(1.2) rotate(360deg);
    }

    .calculator-title {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        text-align: center;
    }

    /* Pantalla de carga */
    .loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--bg-dark);
        z-index: 1000;
        display: none;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .loading-bar {
        width: 200px;
        height: 20px;
        background: #1a1a1a;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }

    .loading-progress {
        width: 0%;
        height: 100%;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        transition: width 2s ease;
        position: relative;
    }

    .loading-text {
        margin-top: 1rem;
        font-size: 1.2rem;
        color: var(--text-light);
    }

    /* Efectos adicionales */
    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    /* Mejoras responsive */
    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }

        .nav {
            grid-template-columns: 1fr;
            padding: 1rem;
            margin: 2rem 0;
        }

        .calculator-card {
            min-height: 200px;
            margin-bottom: 1rem;
        }

        .calculator-icon {
            font-size: 2.5rem;
        }

        .calculator-title {
            font-size: 1.4rem;
        }

        .container {
            padding: 0.5rem;
            width: 95%;
            margin: 0 auto;
        }
    }

    /* Ajustes para pantallas más pequeñas */
    @media (max-width: 480px) {
        h1 {
            font-size: 1.5rem;
            margin: 1rem 0;
        }

        .calculator-card {
            min-height: 180px;
        }

        .calculator-icon {
            font-size: 2rem;
        }

        .calculator-title {
            font-size: 1.2rem;
        }
    }

    /* Efecto de partículas */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
    }

    .particle {
        position: absolute;
        width: 2px;
        height: 2px;
        background: radial-gradient(circle,
                rgba(138, 43, 226, 0.8),
                transparent 70%);
        width: 4px;
        height: 4px;
        border-radius: 50%;
        animation: float 15s infinite linear;
        opacity: 0.6;
    }

    @keyframes float {
        0% {
            transform: translateY(0) translateX(0);
            opacity: 0;
        }

        10% {
            opacity: 0.6;
        }

        100% {
            transform: translateY(-100vh) translateX(100vw);
            opacity: 0;
        }
    }

    /* Medusa eléctrica */
    .electric-jellyfish {
        position: fixed;
        width: 50px;
        height: 50px;
        pointer-events: none;
        z-index: 9999;
        transition: all 0.1s ease;
        mix-blend-mode: screen;
    }

    .jellyfish-core {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: radial-gradient(circle at 30% 30%,
                rgba(138, 43, 226, 0.8),
                rgba(80, 200, 120, 0.4));
        filter: blur(5px);
        animation: pulse 2s infinite;
    }

    .jellyfish-tentacles {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .tentacle {
        position: absolute;
        width: 2px;
        height: 30px;
        background: linear-gradient(to bottom,
                rgba(138, 43, 226, 0.8),
                transparent);
        transform-origin: top center;
        animation: tentacleWave 3s infinite;
    }

    @keyframes tentacleWave {

        0%,
        100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(15deg);
        }

        75% {
            transform: rotate(-15deg);
        }
    }

    .calculator-description {
        color: var(--secondary-color);
        margin-top: 1rem;
        font-size: 0.9rem;
        text-align: center;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .calculator-card:hover .calculator-description {
        opacity: 1;
        transform: translateY(0);
    }
    </style>
</head>

<body>
    <!-- Medusa eléctrica -->
    <div class="electric-jellyfish" id="jellyfish">
        <div class="jellyfish-core"></div>
        <div class="jellyfish-tentacles">
            <div class="tentacle" style="transform: rotate(0deg)"></div>
            <div class="tentacle" style="transform: rotate(45deg)"></div>
            <div class="tentacle" style="transform: rotate(90deg)"></div>
            <div class="tentacle" style="transform: rotate(135deg)"></div>
            <div class="tentacle" style="transform: rotate(180deg)"></div>
            <div class="tentacle" style="transform: rotate(225deg)"></div>
            <div class="tentacle" style="transform: rotate(270deg)"></div>
            <div class="tentacle" style="transform: rotate(315deg)"></div>
        </div>
    </div>

    <!-- Partículas de fondo -->
    <div class="particles" id="particles"></div>

    <!-- Pantalla de carga -->
    <div class="loading-screen" id="loadingScreen">
        <div class="loading-bar">
            <div class="loading-progress" id="loadingProgress"></div>
        </div>
        <div class="loading-text">Cargando calculadora...</div>
    </div>

    <div class="container">
        <div class="setup-instructions">
            <h2>Instrucciones de Instalación</h2>
            <div class="instruction-card">
                <h3>React Calculator</h3>
                <ol>
                    <li>Asegúrate de tener Node.js instalado</li>
                    <li>Abre una terminal y navega a la carpeta del proyecto</li>
                    <li>Ejecuta: <code>cd calculadora-react</code></li>
                    <li>Instala las dependencias: <code>npm install</code></li>
                    <li>Inicia el servidor: <code>npm start</code></li>
                    <li>La aplicación se abrirá en: <code>http://localhost:3000</code></li>
                </ol>
            </div>
        </div>

        <h1>Calculadoras</h1>
        <div class="nav">
            <div class="calculator-card" onclick="loadCalculator('vanilla-js/index.html')">
                <div class="card-content">
                    <i class="calculator-icon fab fa-js"></i>
                    <div class="calculator-title">JavaScript Vanilla</div>
                    <div class="calculator-description">
                        Calculadora ligera y rápida implementada con JavaScript puro.
                        Perfecta para operaciones básicas con una interfaz moderna y responsive.
                    </div>
                </div>
            </div>
            <div class="calculator-card" onclick="loadCalculator('php/index.php')">
                <div class="card-content">
                    <i class="calculator-icon fab fa-php"></i>
                    <div class="calculator-title">PHP Calculator</div>
                    <div class="calculator-description">
                        Procesamiento del lado del servidor para cálculos precisos.
                        Ideal para operaciones complejas y manejo de datos persistentes.
                    </div>
                </div>
            </div>
            <div class="calculator-card" onclick="loadCalculator('http://localhost:3000')">
                <div class="card-content">
                    <i class="calculator-icon fab fa-react"></i>
                    <div class="calculator-title">React Calculator</div>
                    <div class="calculator-description">
                        Implementación moderna con React y estados dinámicos.
                        Interfaz fluida y componentes reutilizables.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Crear partículas
    function createParticles() {
        const container = document.getElementById('particles');
        for (let i = 0; i < 100; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + 'vw';
            particle.style.animationDelay = Math.random() * 15 + 's';
            particle.style.opacity = Math.random() * 0.6;
            particle.style.transform = `scale(${Math.random() * 0.8 + 0.2})`;
            container.appendChild(particle);
        }
    }

    // Seguimiento del cursor con la medusa
    document.addEventListener('mousemove', (e) => {
        const jellyfish = document.getElementById('jellyfish');
        const x = e.clientX - 25; // Centrar horizontalmente
        const y = e.clientY - 25; // Centrar verticalmente

        // Aplicar efecto de suavizado
        requestAnimationFrame(() => {
            jellyfish.style.left = x + 'px';
            jellyfish.style.top = y + 'px';
        });

        // Rotar tentáculos según la dirección del movimiento
        const dx = e.movementX;
        const dy = e.movementY;
        const angle = Math.atan2(dy, dx) * 180 / Math.PI;
        jellyfish.style.transform = `rotate(${angle}deg)`;
    });

    // Función de carga con AJAX
    function loadCalculator(url) {
        const loadingScreen = document.getElementById('loadingScreen');
        const progress = document.getElementById('loadingProgress');

        loadingScreen.style.display = 'flex';
        progress.style.width = '0%';

        // Actualizar la URL sin recargar la página
        window.history.pushState({}, '', url);

        // Simular progreso
        setTimeout(() => progress.style.width = '30%', 200);
        setTimeout(() => progress.style.width = '60%', 600);
        setTimeout(() => progress.style.width = '90%', 900);

        // Cargar contenido con AJAX
        fetch(url)
            .then(response => response.text())
            .then(html => {
                setTimeout(() => {
                    progress.style.width = '100%';
                    // Crear un contenedor temporal
                    const temp = document.createElement('div');
                    temp.innerHTML = html;

                    // Reemplazar el contenido del body manteniendo los scripts
                    document.body.innerHTML = temp.querySelector('body').innerHTML;

                    // Ejecutar los scripts del nuevo contenido
                    const scripts = temp.querySelectorAll('script');
                    scripts.forEach(script => {
                        const newScript = document.createElement('script');
                        Array.from(script.attributes).forEach(attr => {
                            newScript.setAttribute(attr.name, attr.value);
                        });
                        newScript.textContent = script.textContent;
                        document.body.appendChild(newScript);
                    });

                    loadingScreen.style.display = 'none';
                }, 1200);
            })
            .catch(error => {
                console.error('Error loading page:', error);
                // Si hay error, redirigir de forma tradicional
                window.location.href = url;
            });
    }

    // Manejar el botón de retroceso del navegador
    window.addEventListener('popstate', function(event) {
        loadCalculator(window.location.pathname);
    });

    // Iniciar partículas al cargar
    createParticles();
    </script>
</body>

</html>

</html>