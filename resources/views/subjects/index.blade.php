@extends('layouts.app')

@section('title', 'Gestión de Materias 💖')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="gradient-text fw-bold">📚 Gestión de Materias</h1>
                <a href="{{ route('subjects.create') }}" class="btn btn-aesthetic">
                    ✨ Nueva Materia
                </a>
            </div>
            <p class="text-aesthetic">organizá el conocimiento con estilo y color 🌈</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-aesthetic alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse($subjects as $subject)
        <div class="col-md-4 mb-4">
            <div class="aesthetic-card p-4 h-100">
                <!-- Barra de color de la materia -->
                <div class="subject-color-bar mb-3" style="background: {{ $subject->color }}; height: 8px; border-radius: 10px;"></div>
                
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h5 class="gradient-text fw-bold">{{ $subject->name }}</h5>
                    <span class="badge level-badge">{{ $subject->level }}</span>
                </div>
                
                <p class="text-aesthetic mb-3">
                    <i class="bi bi-hash"></i> {{ $subject->code }}
                </p>
                
                <div class="subject-info mb-3">
                    <small class="text-muted">
                        <i class="bi bi-star"></i> {{ $subject->credits }} créditos
                    </small>
                </div>
                
                @if($subject->teachers->count() > 0)
                <div class="teachers-section mb-3">
                    <small class="text-muted">Docentes:</small>
                    <div class="teacher-tags mt-1">
                        @foreach($subject->teachers->take(2) as $teacher)
                        <span class="badge bg-light text-dark me-1">{{ $teacher->name }}</span>
                        @endforeach
                        @if($subject->teachers->count() > 2)
                        <span class="badge bg-light text-dark">+{{ $subject->teachers->count() - 2 }}</span>
                        @endif
                    </div>
                </div>
                @endif
                
                @if($subject->description)
                <p class="text-aesthetic small">{{ Str::limit($subject->description, 100) }}</p>
                @endif
                
                <div class="btn-group w-100">
                    <a href="{{ route('subjects.show', $subject) }}" class="btn btn-outline-aesthetic btn-sm">
                        👀 Ver
                    </a>
                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-outline-aesthetic btn-sm">
                        ✏️ Editar
                    </a>
                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                onclick="return confirm('¿Estás segura de eliminar esta materia? 📚')">
                            🗑️ Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="aesthetic-card p-5 text-center">
                <i class="bi bi-book display-1 gradient-text mb-3"></i>
                <h4 class="text-aesthetic">Todavía no hay materias creadas</h4>
                <p class="text-muted">Comenzá definiendo tu primera materia! 📖</p>
                <a href="{{ route('subjects.create') }}" class="btn btn-aesthetic">
                    ✨ Crear Primera Materia
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>

<style>
    .level-badge {
        background: linear-gradient(45deg, var(--soft-lilac), var(--primary-pink)) !important;
        color: white;
        font-size: 0.7rem;
    }
    
    .teacher-tags .badge {
        font-size: 0.65rem;
        padding: 0.25em 0.5em;
    }
    
    .subject-color-bar {
        transition: all 0.3s ease;
    }
    
    .aesthetic-card:hover .subject-color-bar {
        height: 12px !important;
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