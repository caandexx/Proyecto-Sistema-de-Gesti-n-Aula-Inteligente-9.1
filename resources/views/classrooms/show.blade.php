@extends('layouts.app')

@section('title', $classroom->name . ' 💖')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="aesthetic-card p-5">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h1 class="gradient-text fw-bold">{{ $classroom->name }}</h1>
                        <p class="text-aesthetic mb-0">
                            <i class="bi bi-geo-alt"></i> {{ $classroom->location }}
                        </p>
                    </div>
                    <span class="badge bg-pink fs-6">{{ $classroom->status ?? 'Disponible' }}</span>
                </div>

                <!-- Información Principal -->
                <div class="classroom-details mb-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="detail-card p-3">
                                <i class="bi bi-people gradient-text fs-4"></i>
                                <h5 class="text-aesthetic mt-2">Capacidad</h5>
                                <p class="fs-5 gradient-text fw-bold">{{ $classroom->capacity }} personas</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="detail-card p-3">
                                <i class="bi bi-building gradient-text fs-4"></i>
                                <h5 class="text-aesthetic mt-2">Estado</h5>
                                <p class="fs-5 gradient-text fw-bold">{{ $classroom->status ?? 'Activa' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Descripción -->
                @if($classroom->description)
                <div class="mb-4">
                    <h5 class="text-aesthetic fw-bold mb-3">📝 Descripción</h5>
                    <p class="text-aesthetic">{{ $classroom->description }}</p>
                </div>
                @endif

                <!-- Características -->
                @if($classroom->features && count($classroom->features) > 0)
                <div class="mb-4">
                    <h5 class="text-aesthetic fw-bold mb-3">✨ Características</h5>
                    <div class="features-grid">
                        @foreach($classroom->features as $feature)
                        <span class="feature-badge">{{ $feature }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Acciones -->
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('classrooms.edit', $classroom) }}" class="btn btn-aesthetic flex-fill">
                        ✏️ Editar Aula
                    </a>
                    <a href="{{ route('classrooms.index') }}" class="btn btn-outline-aesthetic">
                        🏫 Volver a Aulas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .detail-card {
        background: rgba(255, 222, 229, 0.3);
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .detail-card:hover {
        background: rgba(255, 222, 229, 0.5);
        transform: translateY(-3px);
    }
    
    .features-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .feature-badge {
        background: linear-gradient(45deg, var(--primary-pink), var(--warm-orange));
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
    }
    
    .badge.bg-pink {
        background: linear-gradient(45deg, var(--primary-pink), var(--warm-orange)) !important;
    }
</style>
@endsection