<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Smart Classroom 💖')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary-pink: #ff9eb5;
            --secondary-pink: #ffb6c1;
            --light-pink: #ffdfe5;
            --warm-orange: #ffb380;
            --soft-lilac: #d8bfd8;
            --text-dark: #5a3d5c;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, var(--light-pink) 0%, var(--soft-lilac) 100%);
            min-height: 100vh;
        }
        
        .aesthetic-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            border: none;
            box-shadow: 0 8px 32px rgba(255, 158, 181, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .aesthetic-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(255, 158, 181, 0.3);
        }
        
        .btn-aesthetic {
            background: linear-gradient(45deg, var(--primary-pink), var(--warm-orange));
            border: none;
            border-radius: 50px;
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            transition: all 0.3s ease;
        }
        
        .btn-aesthetic:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 158, 181, 0.4);
            color: white;
        }
        
        .navbar-aesthetic {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 20px rgba(255, 158, 181, 0.2);
        }
        
        .text-aesthetic {
            color: var(--text-dark);
        }
        
        .gradient-text {
            background: linear-gradient(45deg, var(--primary-pink), var(--warm-orange));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-outline-aesthetic {
            border: 2px solid var(--primary-pink);
            border-radius: 50px;
            color: var(--primary-pink);
            font-weight: 600;
            padding: 10px 28px;
            transition: all 0.3s ease;
        }
        
        .btn-outline-aesthetic:hover {
            background: var(--primary-pink);
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light navbar-aesthetic">
        <div class="container">
            <a class="navbar-brand gradient-text fw-bold" href="{{ url('/') }}">
                💖 Smart Classroom
            </a>
            
            <!-- Botón para móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navegación Principal -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-aesthetic" href="{{ route('classrooms.index') }}">
                            🏫 Aulas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-aesthetic" href="{{ route('teachers.index') }}">
                            👩‍🏫 Docentes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-aesthetic" href="{{ route('dashboard') }}">
                            📊 Dashboard
                        </a>
                    </li>
                </ul>

                <!-- Menú derecho simple sin login -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link text-aesthetic">
                            🌸 Modo Aesthetic
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>