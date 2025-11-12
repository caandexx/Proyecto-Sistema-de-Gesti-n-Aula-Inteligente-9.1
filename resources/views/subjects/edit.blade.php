@extends('layouts.app')

@section('title', 'Editar ' . $subject->name . ' 💖')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="aesthetic-card p-5">
                <h1 class="gradient-text fw-bold mb-4">✏️ Editar {{ $subject->name }}</h1>
                <p class="text-aesthetic mb-4">Actualizá los detalles de esta materia con estilo aesthetic 🌈</p>

                <form action="{{ route('subjects.update', $subject) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label text-aesthetic">📖 Nombre de la Materia</label>
                            <input type="text" class="form-control aesthetic-input" id="name" name="name" 
                                   value="{{ $subject->name }}" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="code" class="form-label text-aesthetic">🔢 Código</label>
                            <input type="text" class="form-control aesthetic-input" id="code" name="code" 
                                   value="{{ $subject->code }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="credits" class="form-label text-aesthetic">⭐ Créditos</label>
                            <input type="number" class="form-control aesthetic-input" id="credits" name="credits" 
                                   min="0" value="{{ $subject->credits }}" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="level" class="form-label text-aesthetic">📊 Nivel</label>
                            <select class="form-control aesthetic-input" id="level" name="level" required>
                                <option value="básico" {{ $subject->level == 'básico' ? 'selected' : '' }}>Básico 🌱</option>
                                <option value="intermedio" {{ $subject->level == 'intermedio' ? 'selected' : '' }}>Intermedio 🌸</option>
                                <option value="avanzado" {{ $subject->level == 'avanzado' ? 'selected' : '' }}>Avanzado 💫</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label text-aesthetic">🎨 Color de la Materia</label>
                        <div class="color-picker d-flex gap-2 align-items-center">
                            <input type="color" class="form-control-color" id="color" name="color" value="{{ $subject->color }}" 
                                   style="width: 60px; height: 45px; border: none; border-radius: 10px; cursor: pointer;">
                            <small class="text-muted">Color actual: {{ $subject->color }}</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-aesthetic">👩‍🏫 Docentes Asignados</label>
                        <div class="teachers-checkbox">
                            @forelse($teachers as $teacher)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="teachers[]" 
                                       value="{{ $teacher->id }}" id="teacher{{ $teacher->id }}"
                                       {{ $subject->teachers->contains($teacher->id) ? 'checked' : '' }}>
                                <label class="form-check-label text-aesthetic" for="teacher{{ $teacher->id }}">
                                    {{ $teacher->name }} - {{ $teacher->specialty }}
                                </label>
                            </div>
                            @empty
                            <p class="text-muted">No hay docentes registrados. 
                                <a href="{{ route('teachers.create') }}" class="text-decoration-none">Agregá docentes primero</a>
                            </p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label text-aesthetic">📝 Descripción</label>
                        <textarea class="form-control aesthetic-input" id="description" name="description" 
                                  rows="3" placeholder="Describí los objetivos y contenido de la materia... 📚">{{ $subject->description }}</textarea>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-aesthetic flex-fill">
                            💖 Actualizar Materia
                        </button>
                        <a href="{{ route('subjects.show', $subject) }}" class="btn btn-outline-aesthetic">
                            ↩️ Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .aesthetic-input {
        border: 2px solid var(--light-pink);
        border-radius: 15px;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }
    
    .aesthetic-input:focus {
        border-color: var(--primary-pink);
        box-shadow: 0 0 0 0.2rem rgba(255, 158, 181, 0.25);
    }
    
    .teachers-checkbox {
        max-height: 200px;
        overflow-y: auto;
        padding: 15px;
        background: rgba(255, 222, 229, 0.2);
        border-radius: 15px;
    }
    
    .form-check-input:checked {
        background-color: var(--primary-pink);
        border-color: var(--primary-pink);
    }
</style>
@endsection