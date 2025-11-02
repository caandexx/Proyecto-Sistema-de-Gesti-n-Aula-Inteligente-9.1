@extends('layouts.app')

@section('title', 'Gestión de Reservas 💖')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="gradient-text fw-bold">📅 Gestión de Reservas</h1>
                <a href="{{ route('reservations.create') }}" class="btn btn-aesthetic">
                    ✨ Nueva Reserva
                </a>
            </div>
            <p class="text-aesthetic">Organizá los horarios con estilo y precisión ⏰</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-aesthetic alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filtros Rápidos -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="aesthetic-card p-4">
                <h5 class="text-aesthetic mb-3">🔍 Filtros Rápidos</h5>
                <div class="d-flex gap-2 flex-wrap">
                    <a href="{{ route('reservations.index') }}" class="btn btn-outline-aesthetic btn-sm">
                        Todas
                    </a>
                    <a href="?status=confirmada" class="btn btn-outline-success btn-sm">
                        ✅ Confirmadas
                    </a>
                    <a href="?status=pendiente" class="btn btn-outline-warning btn-sm">
                        ⏳ Pendientes
                    </a>
                    <a href="?status=cancelada" class="btn btn-outline-danger btn-sm">
                        ❌ Canceladas
                    </a>
                    <a href="?today=1" class="btn btn-outline-info btn-sm">
                        📅 Hoy
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($reservations as $reservation)
        <div class="col-md-6 mb-4">
            <div class="aesthetic-card p-4 h-100">
                <!-- Estado de la reserva -->
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h5 class="gradient-text fw-bold">{{ $reservation->classroom->name }}</h5>
                        <p class="text-muted mb-0">
                            <i class="bi bi-calendar"></i> 
                            {{ $reservation->reservation_date->format('d/m/Y') }}
                        </p>
                    </div>
                    <span class="badge status-badge {{ $reservation->status }}">
                        @if($reservation->status == 'confirmada')
                            ✅ Confirmada
                        @elseif($reservation->status == 'pendiente')
                            ⏳ Pendiente
                        @else
                            ❌ Cancelada
                        @endif
                    </span>
                </div>

                <!-- Información de horario -->
                <div class="reservation-time mb-3">
                    <p class="text-aesthetic mb-2">
                        <i class="bi bi-clock"></i> 
                        {{ \Carbon\Carbon::parse($reservation->start_time)->format('H:i') }} - 
                        {{ \Carbon\Carbon::parse($reservation->end_time)->format('H:i') }}
                    </p>
                </div>

                <!-- Información de docente y materia -->
                <div class="reservation-info mb-3">
                    <p class="text-aesthetic mb-1">
                        <i class="bi bi-person"></i> {{ $reservation->teacher->name }}
                    </p>
                    <p class="text-muted mb-2">
                        <i class="bi bi-book"></i> {{ $reservation->subject->name }}
                    </p>
                    
                    @if($reservation->student_count)
                    <small class="text-muted">
                        <i class="bi bi-people"></i> {{ $reservation->student_count }} estudiantes
                    </small>
                    @endif

                    @if($reservation->description)
                    <p class="text-aesthetic small mt-2">
                        "{{ Str::limit($reservation->description, 80) }}"
                    </p>
                    @endif
                </div>

                <!-- Acciones -->
                <div class="btn-group w-100">
                    <a href="{{ route('reservations.show', $reservation) }}" class="btn btn-outline-aesthetic btn-sm">
                        👀 Ver
                    </a>
                    <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-outline-aesthetic btn-sm">
                        ✏️ Editar
                    </a>
                    
                    @if($reservation->status == 'pendiente')
                    <form action="{{ route('reservations.confirm', $reservation) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-success btn-sm">
                            ✅ Confirmar
                        </button>
                    </form>
                    @endif

                    <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                onclick="return confirm('¿Estás segura de eliminar esta reserva? 📅')">
                            🗑️ Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="aesthetic-card p-5 text-center">
                <i class="bi bi-calendar display-1 gradient-text mb-3"></i>
                <h4 class="text-aesthetic">Todavía no hay reservas creadas</h4>
                <p class="text-muted">Comenzá programando tu primera reserva! ⏰</p>
                <a href="{{ route('reservations.create') }}" class="btn btn-aesthetic">
                    ✨ Crear Primera Reserva
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>

<style>
    .status-badge.confirmada {
        background: linear-gradient(45deg, #28a745, #20c997) !important;
        color: white;
    }
    
    .status-badge.pendiente {
        background: linear-gradient(45deg, #ffc107, #fd7e14) !important;
        color: white;
    }
    
    .status-badge.cancelada {
        background: linear-gradient(45deg, #dc3545, #e83e8c) !important;
        color: white;
    }
    
    .reservation-time {
        background: rgba(255, 222, 229, 0.3);
        padding: 10px;
        border-radius: 10px;
        border-left: 4px solid var(--primary-pink);
    }
</style>
@endsection