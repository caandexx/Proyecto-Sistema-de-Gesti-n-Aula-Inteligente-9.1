@extends('layouts.app')

@section('title', $subject->name . ' 💖')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="aesthetic-card p-5">
                <!-- Header con color -->
                <div class="subject-header mb-4" style="background: {{ $subject->color }}; height: 10px; border-radius: 10px;"></div>
                
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div>
                        <h1 class="gradient-text fw-bold">{{ $subject->name }}</h1>
                        <p class="text-aesthetic mb-0">
                            <i class="bi bi-hash"></i> {{ $subject->code }} • 
                            <span class="badge level-badge">{{ $subject->level }}</span>
                        </p>
                    </div>
                    <div class="text-end">
                        <span class="badge credits-badge">
                            ⭐ {{ $subject->credits }} créditos
                        </span>
                    </div>
                </div>

                <!-- Información básica -->
                <div class="subject-details mb-4">
                    @if($subject->description)
                    <div class="mb-3">
                        <h5 class="text-aesthetic fw-bold">📝 Descripción</h5>
                        <p class="text-aesthetic">{{ $subject->description }}</p>
                    </div>
                    @endif
                </div>

                <!-- Docentes asignados -->
                <div class="teachers-section mb-4">
                    <h5 class="text-aesthetic fw-bold mb-3">👩‍🏫 Docentes de esta materia</h5>
                    @if($subject->teachers->count() > 0)
                    <div class="row">
                        @foreach($subject->teachers as $teacher)
                        <div class="col-md-6 mb-3">
                            <div class="teacher-card aesthetic-card p-3">
                                <div class="d-flex align-items-center">
                                    <div class="teacher-avatar me-3">
                                        <div class="avatar-placeholder rounded-circle d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px; background: linear-gradient(45deg, var(--primary-pink), var(--warm-orange));">
                                            <span class="text-white fw-bold">{{ substr($teacher->name, 0, 1) }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="text-aesthetic mb-1">{{ $teacher->name }}</h6>
                                        <small class="text-muted">{{ $teacher->specialty }}</small>
                                        <br>
                                        <small class="text-muted">
                                            <i class="bi bi-envelope"></i> {{ $teacher->email }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-3">
                        <i class="bi bi-person-x display-6 gradient-text mb-3"></i>
                        <p class="text-aesthetic">Esta materia no tiene docentes asignados</p>
                        <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-aesthetic btn-sm">
                            ✏️ Asignar Docentes
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Acciones -->
                <div class="d-flex gap-3">
                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-aesthetic flex-fill">
                        ✏️ Editar Materia
                    </a>
                    <a href="{{ route('subjects.index') }}" class="btn btn-outline-aesthetic">
                        📚 Volver a Materias
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .level-badge {
        background: linear-gradient(45deg, var(--soft-lilac), var(--primary-pink)) !important;
        color: white;
    }
    
    .credits-badge {
        background: linear-gradient(45deg, var(--warm-orange), var(--primary-pink)) !important;
        color: white;
        font-size: 0.9rem;
        padding: 0.5em 1em;
    }
    
    .teacher-card {
        transition: all 0.3s ease;
    }
    
    .teacher-card:hover {
        transform: translateY(-3px);
    }
    
    .subject-header {
        transition: all 0.3s ease;
    }
    
    .aesthetic-card:hover .subject-header {
        height: 15px !important;
    }
</style>
@endsection