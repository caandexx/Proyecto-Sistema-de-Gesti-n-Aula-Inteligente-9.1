@extends('layouts.app')

@section('title', 'Gestión de Aulas 💖')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="gradient-text fw-bold">🏫 Gestión de Aulas</h1>
                <a href="{{ route('classrooms.create') }}" class="btn btn-aesthetic">
                    ✨ Nueva Aula
                </a>
            </div>
            <p class="text-aesthetic">administrá tus espacios con estilo y eficiencia 💅</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-aesthetic alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse($classrooms as $classroom)
        <div class="col-md-4 mb-4">
            <div class="aesthetic-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h5 class="gradient-text fw-bold">{{ $classroom->name }}</h5>
                    <span class="badge bg-pink">{{ $classroom->status ?? 'Disponible' }}</span>
                </div>
                
                <p class="text-aesthetic mb-3">
                    <i class="bi bi-geo-alt"></i> {{ $classroom->location }}
                </p>
                
                <div class="classroom-info mb-3">
                    <small class="text-muted">
                        <i class="bi bi-people"></i> Capacidad: {{ $classroom->capacity }} personas
                    </small>
                </div>
                
                @if($classroom->description)
                <p class="text-aesthetic small">{{ $classroom->description }}</p>
                @endif
                
                <div class="btn-group w-100">
                    <a href="{{ route('classrooms.show', $classroom) }}" class="btn btn-outline-aesthetic btn-sm">
                        👀 Ver
                    </a>
                    <a href="{{ route('classrooms.edit', $classroom) }}" class="btn btn-outline-aesthetic btn-sm">
                        ✏️ Editar
                    </a>
                    <form action="{{ route('classrooms.destroy', $classroom) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                onclick="return confirm('¿Estás segura de eliminar esta aula? 💫')">
                            🗑️ Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="aesthetic-card p-5 text-center">
                <i class="bi bi-building display-1 gradient-text mb-3"></i>
                <h4 class="text-aesthetic">Todavía no hay aulas creadas</h4>
                <p class="text-muted">Comenzá creando tu primera aula aesthetic! 🌸</p>
                <a href="{{ route('classrooms.create') }}" class="btn btn-aesthetic">
                    ✨ Crear Primera Aula
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>

<style>
    .badge.bg-pink {
        background: linear-gradient(45deg, var(--primary-pink), var(--warm-orange)) !important;
    }
    
    .alert-aesthetic {
        background: rgba(255, 222, 229, 0.9);
        border: none;
        border-radius: 15px;
        color: var(--text-dark);
        border-left: 4px solid var(--primary-pink);
    }
</style>
@endsection