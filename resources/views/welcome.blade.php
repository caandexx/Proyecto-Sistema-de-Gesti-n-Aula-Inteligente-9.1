<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Classroom 💖 - Sistema de Gestión Inteligente</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-pink: #ff9eb5;
            --secondary-pink: #ffb6c1;
            --light-pink: #ffdfe5;
            --warm-orange: #ffb380;
            --soft-lilac: #d8bfd8;
            --text-dark: #5a3d5c;
            --dark-pink: #e91e63;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, var(--light-pink) 0%, var(--soft-lilac) 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* Hero Section Centrada y Expansiva */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 20px;
        }
        
        .background-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80vw;
            height: 80vh;
            background: radial-gradient(circle, rgba(255, 158, 181, 0.2) 0%, rgba(255, 179, 128, 0.1) 40%, transparent 70%);
            z-index: 1;
        }
        
        .main-container {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1200px;
        }
        
        /* Header Centrado */
        .main-header {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .logo-animation {
            font-size: 6rem;
            margin-bottom: 20px;
            display: inline-block;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-10px) scale(1.05); }
        }
        
        .main-title {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        
        .subtitle {
            font-size: 1.5rem;
            max-width: 600px;
            margin: 0 auto 40px;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-pink), var(--warm-orange), var(--dark-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            background-size: 200% 200%;
            animation: gradientShift 3s ease infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Botones Principales Centrados */
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 60px;
        }
        
        .btn-epic {
            background: linear-gradient(135deg, var(--primary-pink), var(--warm-orange));
            border: none;
            border-radius: 50px;
            color: white;
            font-weight: 700;
            padding: 20px 45px;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 15px 35px rgba(255, 158, 181, 0.4);
            position: relative;
            overflow: hidden;
        }
        
        .btn-epic::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s;
        }
        
        .btn-epic:hover::before {
            left: 100%;
        }
        
        .btn-epic:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 20px 45px rgba(255, 158, 181, 0.6);
        }
        
        .btn-outline-epic {
            border: 3px solid transparent;
            border-radius: 50px;
            background: linear-gradient(135deg, var(--primary-pink), var(--warm-orange)) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            color: var(--primary-pink);
            font-weight: 700;
            padding: 18px 42px;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: white;
        }
        
        .btn-outline-epic:hover {
            background: linear-gradient(135deg, var(--primary-pink), var(--warm-orange));
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(255, 158, 181, 0.3);
        }
        
        /* Features Grid Expandido */
        .features-section {
            margin: 60px 0;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px 30px;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 15px 40px rgba(255, 158, 181, 0.15);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, var(--primary-pink), var(--warm-orange));
        }
        
        .feature-card:hover {
            transform: translateY(-15px) scale(1.05);
            box-shadow: 0 25px 60px rgba(255, 158, 181, 0.25);
        }
        
        .feature-icon {
            font-size: 3.5rem;
            margin-bottom: 25px;
            display: inline-block;
            animation: bounce 2s ease infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-15px); }
            60% { transform: translateY(-7px); }
        }
        
        .feature-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--text-dark);
        }
        
        .feature-description {
            color: #666;
            line-height: 1.6;
        }
        
        /* Stats Section Centrada */
        .stats-section {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 30px;
            padding: 50px;
            margin: 60px auto;
            max-width: 900px;
            box-shadow: 0 20px 50px rgba(255, 158, 181, 0.1);
            text-align: center;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-pink), var(--warm-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: block;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        /* Quick Actions */
        .quick-actions {
            margin: 60px auto;
            max-width: 1000px;
            text-align: center;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .action-btn {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 20px;
            padding: 25px 20px;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 158, 181, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }
        
        .action-btn:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(255, 158, 181, 0.2);
            background: white;
        }
        
        .action-icon {
            font-size: 2rem;
            background: linear-gradient(135deg, var(--primary-pink), var(--warm-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-dark);
            font-size: 0.9rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-title {
                font-size: 2.5rem;
            }
            
            .subtitle {
                font-size: 1.2rem;
                padding: 0 20px;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-epic, .btn-outline-epic {
                padding: 18px 35px;
                font-size: 1.1rem;
                width: 280px;
                justify-content: center;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
                padding: 0 15px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .actions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        /* Animaciones de entrada */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }
        
        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .text-aesthetic {
            color: var(--text-dark);
        }
    </style>
</head>
<body>
    <!-- Hero Section Centrada -->
    <section class="hero-section">
        <div class="background-glow"></div>
        
        <div class="main-container">
            <!-- Header Principal Centrado -->
            <div class="main-header fade-in-up">
                <div class="logo-animation gradient-text">💫</div>
                <h1 class="main-title gradient-text">
                    Smart Classroom
                </h1>
                <p class="subtitle text-aesthetic">
                    La plataforma inteligente que transforma la gestión educativa moderna
                </p>
                
                <!-- Botones de Acción Principales -->
                <div class="cta-buttons fade-in-up">
                    <a href="/login" class="btn-epic">
                        <i class="fas fa-rocket"></i>
                        Comenzar Ahora
                    </a>
                    <a href="/dashboard" class="btn-outline-epic">
                        <i class="fas fa-chart-bar"></i>
                        Explorar Demo
                    </a>
                </div>
            </div>

            <!-- Stats en Tiempo Real -->
            <div class="stats-section fade-in-up">
                <h3 class="gradient-text mb-4">Nuestra Comunidad Educativa</h3>
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number" id="classroomsCount">0</span>
                        <div class="stat-label">Aulas Inteligentes</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" id="teachersCount">0</span>
                        <div class="stat-label">Docentes Activos</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" id="subjectsCount">0</span>
                        <div class="stat-label">Materias Impartidas</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number" id="reservationsCount">0</span>
                        <div class="stat-label">Reservas Diarias</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Grid Expandido -->
    <section class="features-section">
        <div class="features-grid">
            <div class="feature-card fade-in-up">
                <div class="feature-icon gradient-text">
                    <i class="fas fa-brain"></i>
                </div>
                <h4 class="feature-title">Inteligencia Artificial</h4>
                <p class="feature-description">
                    Optimización automática de horarios y recursos con algoritmos predictivos
                </p>
            </div>
            
            <div class="feature-card fade-in-up">
                <div class="feature-icon gradient-text">
                    <i class="fas fa-bolt"></i>
                </div>
                <h4 class="feature-title">IoT en Tiempo Real</h4>
                <p class="feature-description">
                    Control remoto de dispositivos del aula desde cualquier lugar del mundo
                </p>
            </div>
            
            <div class="feature-card fade-in-up">
                <div class="feature-icon gradient-text">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h4 class="feature-title">Analíticas Avanzadas</h4>
                <p class="feature-description">
                    Métricas detalladas y reportes automáticos para la toma de decisiones
                </p>
            </div>
            
            <div class="feature-card fade-in-up">
                <div class="feature-icon gradient-text">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4 class="feature-title">Seguridad Total</h4>
                <p class="feature-description">
                    Encriptación de datos y controles de acceso multi-nivel para tu información
                </p>
            </div>
        </div>
    </section>

    <!-- Quick Actions -->
    <section class="quick-actions">
        <h3 class="gradient-text mb-4">Acceso Rápido</h3>
        <div class="actions-grid">
            <a href="/classrooms" class="action-btn">
                <span class="action-icon">🏫</span>
                <span>Aulas</span>
            </a>
            <a href="/teachers" class="action-btn">
                <span class="action-icon">👩‍🏫</span>
                <span>Docentes</span>
            </a>
            <a href="/subjects" class="action-btn">
                <span class="action-icon">📚</span>
                <span>Materias</span>
            </a>
            <a href="/reservations" class="action-btn">
                <span class="action-icon">📅</span>
                <span>Reservas</span>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>💖 <strong>Smart Classroom</strong> - Transformando la educación con tecnología y estilo</p>
        <p class="mt-2">Sistema de Gestión Inteligente • Versión 2.0</p>
    </footer>

    <script>
        // Animaciones al hacer scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.fade-in-up').forEach(el => observer.observe(el));
        
        // Contadores animados
        function animateCounter(element, target) {
            let count = 0;
            const duration = 2500;
            const increment = target / (duration / 16);
            
            const timer = setInterval(() => {
                count += increment;
                if (count >= target) {
                    count = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(count);
            }, 16);
        }
        
        // Simular datos (en producción conectar con API)
        setTimeout(() => {
            animateCounter(document.getElementById('classroomsCount'), 15);
            animateCounter(document.getElementById('teachersCount'), 24);
            animateCounter(document.getElementById('subjectsCount'), 36);
            animateCounter(document.getElementById('reservationsCount'), 128);
        }, 1000);
        
        // Efecto de ripple en botones
        document.querySelectorAll('.btn-epic, .action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = btn.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.6);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    pointer-events: none;
                `;
                
                btn.style.position = 'relative';
                btn.style.overflow = 'hidden';
                btn.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });
        
        // Agregar estilo para ripple
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>