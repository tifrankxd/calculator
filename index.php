<!DOCTYPE html>
<html>

<head>
    <title>Calculadoras</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Agregamos Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    :root {
        --primary-color: #8A2BE2;
        --secondary-color: #50C878;
        --bg-dark: #0a0a0a;
        --text-light: #ffffff;
        --card-bg: #1a1a1a;
        --neon-shadow: 0 0 10px rgba(138, 43, 226, 0.5);
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
        color: var(--text-light);
        text-shadow:
            2px 2px var(--primary-color),
            -2px -2px var(--secondary-color);
        animation: glitch 2s infinite;
    }

    @keyframes glitch {
        0% {
            transform: translate(0);
        }

        20% {
            transform: translate(-2px, 2px);
        }

        40% {
            transform: translate(-2px, -2px);
        }

        60% {
            transform: translate(2px, 2px);
        }

        80% {
            transform: translate(2px, -2px);
        }

        100% {
            transform: translate(0);
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
        border: 4px solid transparent;
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
        z-index: -1;
    }

    .particle {
        position: absolute;
        width: 2px;
        height: 2px;
        background: var(--primary-color);
        border-radius: 50%;
        animation: float 20s infinite linear;
    }

    @keyframes float {
        0% {
            transform: translateY(0) translateX(0);
        }

        100% {
            transform: translateY(-100vh) translateX(100vw);
        }
    }
    </style>
</head>

<body>
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
        <h1>Calculadoras</h1>
        <div class="nav">
            <div class="calculator-card" onclick="loadCalculator('vanilla-js/index.html')">
                <div class="card-content">
                    <i class="calculator-icon fab fa-js"></i>
                    <div class="calculator-title">JavaScript Vanilla</div>
                </div>
            </div>
            <div class="calculator-card" onclick="loadCalculator('php/index.php')">
                <div class="card-content">
                    <i class="calculator-icon fab fa-php"></i>
                    <div class="calculator-title">PHP Calculator</div>
                </div>
            </div>
            <div class="calculator-card" onclick="loadCalculator('http://localhost:3000')">
                <div class="card-content">
                    <i class="calculator-icon fab fa-react"></i>
                    <div class="calculator-title">React Calculator</div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Crear partículas
    function createParticles() {
        const container = document.getElementById('particles');
        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + 'vw';
            particle.style.animationDelay = Math.random() * 20 + 's';
            container.appendChild(particle);
        }
    }

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