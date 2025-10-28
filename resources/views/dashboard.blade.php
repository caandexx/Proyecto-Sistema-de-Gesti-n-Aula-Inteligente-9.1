@extends('layouts.app')

@section('title', 'Dashboard 💖')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="aesthetic-card p-4">
                <h1 class="h3 gradient-text fw-bold mb-2">
                    👋 welcome back, {{ Auth::user()->name }}!
                </h1>
                <p class="text-aesthetic mb-0">
                    organizá tu mundo, sin perder el estilo 💅<br>
                    todo bajo control (y con estética) 💻💖
                </p>
            </div>
        </div>
    </div>

    <!-- Métricas -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="aesthetic-card p-4 text-center">
                <i class="bi bi-building display-6 gradient-text mb-2"></i>
                <h3 class="gradient-text fw-bold">5</h3>
                <p class="text-aesthetic mb-0">Aulas Activas</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="aesthetic-card p-4 text-center">
                <i class="bi bi-person display-6 gradient-text mb-2"></i>
                <h3 class="gradient-text fw-bold">12</h3>
                <p class="text-aesthetic mb-0">Docentes</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="aesthetic-card p-4 text-center">
                <i class="bi bi-calendar-check display-6 gradient-text mb-2"></i>
                <h3 class="gradient-text fw-bold">8</h3>
                <p class="text-aesthetic mb-0">Reservas Hoy</p>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="aesthetic-card p-4 text-center">
                <i class="bi bi-lightning-charge display-6 gradient-text mb-2"></i>
                <h3 class="gradient-text fw-bold">15</h3>
                <p class="text-aesthetic mb-0">Dispositivos</p>
            </div>
        </div>
    </div>

    <!-- Acciones Rápidas -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="aesthetic-card p-4 h-100">
                <h4 class="gradient-text fw-bold mb-3">🚀 Acciones Rápidas</h4>
                <div class="d-grid gap-2">
                    <a href="{{ route('classrooms.create') }}" class="btn btn-aesthetic">
                        🏫 Nueva Aula
                    </a>
                    <a href="#" class="btn btn-outline-aesthetic">
                        👩‍🏫 Agregar Docente
                    </a>
                    <a href="#" class="btn btn-outline-aesthetic">
                        📅 Nueva Reserva
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="aesthetic-card p-4 h-100">
                <h4 class="gradient-text fw-bold mb-3">📊 Actividad Reciente</h4>
                <div class="activity-list">
                    <div class="d-flex align-items-center mb-3">
                        <div class="activity-icon me-3">
                            <i class="bi bi-check-circle-fill text-success"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-aesthetic">Aula 101 reservada</p>
                            <small class="text-muted">Hace 5 minutos</small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="activity-icon me-3">
                            <i class="bi bi-gear-fill gradient-text"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-aesthetic">Aire acondicionado activado</p>
                            <small class="text-muted">Hace 15 minutos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .activity-icon {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection