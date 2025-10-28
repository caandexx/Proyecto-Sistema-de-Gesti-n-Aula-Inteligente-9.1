@extends('layouts.app')

@section('title', 'Gestión de Docentes 💖')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="gradient-text fw-bold">👩‍🏫 Gestión de Docentes</h1>
                <a href="{{ route('teachers.create') }}" class="btn btn-aesthetic">
                    ✨ Nuevo Docente
                </a>
            </div>
            <p class="text-aesthetic">Administrá tu equipo educativo con estilo y eficiencia 💅</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-aesthetic alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        @forelse($teachers as $teacher)
        <div class="col-md-4 mb-4">
            <div class="aesthetic-card p-4 h-100 text-center">
                <!-- Avatar del docente -->
                <div class="teacher-avatar mb-3">
                    <div class="avatar-placeholder rounded-circle mx-auto d-flex align-items-center justify-content-center"
                         style="width: 80px; height: 80px; background: linear-gradient(45deg, var(--primary-pink), var(--warm-orange));">
                        <span class="text-white fw-bold fs-4">{{ substr($teacher->name, 0, 1) }}</span>
                    </div>
                </div>
                
                <h5 class="gradient-text fw-bold mb-2">{{ $teacher->name }}</h5>
                <p class="text-muted mb-2">{{ $teacher->specialty }}</p>
                
                <div class="teacher-info mb-3">
                    <small class="text-aesthetic">
                        <i class="bi bi-envelope"></i> {{ $teacher->email }}
                    </small>
                    <br>
                    @if($teacher->phone)
                    <small class="text-muted">
                        <i class="bi bi-telephone"></i> {{ $teacher->phone }}
                    </small>
                    @endif
                </div>
                
                @if($teacher->bio)
                <p class="text-aesthetic small">{{ Str::limit($teacher->bio, 100) }}</p>
                @endif
                
                <div class="btn-group w-100">
                    <a href="{{ route('teachers.show', $teacher) }}" class="btn btn-outline-aesthetic btn-sm">
                        👀 Ver
                    </a>
                    <a href="{{ route('teachers.edit', $teacher) }}" class="btn btn-outline-aesthetic btn-sm">
                        ✏️ Editar
                    </a>
                    <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" 
                                onclick="return confirm('¿Estás segura de eliminar este docente? 💫')">
                            🗑️ Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="aesthetic-card p-5 text-center">
                <i class="bi bi-person display-1 gradient-text mb-3"></i>
                <h4 class="text-aesthetic">Todavía no hay docentes registrados</h4>
                <p class="text-muted">Comenzá agregando tu primer docente al equipo! 🌸</p>
                <a href="{{ route('teachers.create') }}" class="btn btn-aesthetic">
                    ✨ Agregar Primer Docente
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>

<style>
    .teacher-avatar img {
        object-fit: cover;
    }
    
    .avatar-placeholder {
        border: 3px solid rgba(255, 255, 255, 0.8);
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