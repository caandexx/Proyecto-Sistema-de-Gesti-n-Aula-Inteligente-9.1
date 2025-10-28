@extends('layouts.app')

@section('title', 'Smart Classroom 💖')

@section('content')
<div class="container-fluid">
    <!-- Hero Section -->
    <div class="row min-vh-100 align-items-center">
        <div class="col-lg-6">
            <div class="aesthetic-card p-5 mx-4">
                <!-- Logo y Título Principal -->
                <div class="text-center mb-5">
                    <div class="display-1 gradient-text mb-3">💖</div>
                    <h1 class="display-4 gradient-text fw-bold mb-3">
                        Smart Classroom
                    </h1>
                    <p class="lead text-aesthetic fs-4">
                        Tu aula, pero más inteligente y con estilo ✨
                    </p>
                </div>

                <!-- Acciones Principales -->
                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="aesthetic-card p-4 text-center h-100 action-card">
                            <i class="bi bi-building display-4 gradient-text mb-3"></i>
                            <h4 class="text-aesthetic fw-bold">Gestión de Aulas</h4>
                            <p class="text-muted mb-3">Administrá tus espacios educativos</p>
                            <a href="{{ route('classrooms.index') }}" class="btn btn-aesthetic w-100">
                                🏫 Ver Aulas
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="aesthetic-card p-4 text-center h-100 action-card">
                            <i class="bi bi-dashboard display-4 gradient-text mb-3"></i>
                            <h4 class="text-aesthetic fw-bold">Dashboard</h4>
                            <p class="text-muted mb-3">Control total en tiempo real</p>
                            <a href="{{ route('dashboard') }}" class="btn btn-aesthetic w-100">
                                📊 Ver Dashboard
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Acción Secundaria -->
                <div class="text-center">
                    <p class="text-aesthetic mb-3">¿Lista para empezar? 🌸</p>
                    <a href="{{ route('classrooms.create') }}" class="btn btn-outline-aesthetic btn-lg">
                        ✨ Crear Mi Primera Aula
                    </a>
                </div>
            </div>
        </div>

        <!-- Sidebar Decorativo -->
        <div class="col-lg-6 d-none d-lg-block">
            <div class="aesthetic-sidebar p-5">
                <div class="feature-list">
                    <div class="feature-item mb-4">
                        <i class="bi bi-magic gradient-text me-3 fs-4"></i>
                        <span class="text-aesthetic fs-5">Diseño aesthetic único</span>
                    </div>
                    <div class="feature-item mb-4">
                        <i class="bi bi-lightning-charge gradient-text me-3 fs-4"></i>
                        <span class="text-aesthetic fs-5">Control de dispositivos IoT</span>
                    </div>
                    <div class="feature-item mb-4">
                        <i class="bi bi-calendar-check gradient-text me-3 fs-4"></i>
                        <span class="text-aesthetic fs-5">Sistema de reservas inteligente</span>
                    </div>
                    <div class="feature-item mb-4">
                        <i class="bi bi-graph-up gradient-text me-3 fs-4"></i>
                        <span class="text-aesthetic fs-5">Métricas en tiempo real</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .min-vh-100 {
        min-height: 100vh;
    }
    
    .action-card {
        transition: all 0.3s ease;
    }
    
    .action-card:hover {
        transform: translateY(-10px);
    }
    
    .aesthetic-sidebar {
        background: linear-gradient(135deg, rgba(255, 158, 181, 0.1) 0%, rgba(216, 191, 216, 0.1) 100%);
        border-radius: 30px;
        height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .feature-item {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .feature-item:hover {
        background: rgba(255, 255, 255, 0.95);
        transform: translateX(10px);
    }
    
    .btn-outline-aesthetic {
        border: 2px solid var(--primary-pink);
        border-radius: 50px;
        color: var(--primary-pink);
        font-weight: 600;
        padding: 12px 40px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    
    .btn-outline-aesthetic:hover {
        background: var(--primary-pink);
        color: white;
        transform: scale(1.05);
    }
</style>
@endsection