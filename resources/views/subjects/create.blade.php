@extends('layouts.app')

@section('title', 'Nueva Materia 💖')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="aesthetic-card p-5">
                <h1 class="gradient-text fw-bold mb-4">✨ Crear Nueva Materia</h1>
                
                <form action="{{ route('subjects.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-aesthetic">📖 Nombre</label>
                            <input type="text" name="name" class="form-control aesthetic-input" 
                                   value="{{ old('name') }}" required>
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-aesthetic">🔢 Código</label>
                            <input type="text" name="code" class="form-control aesthetic-input" 
                                   value="{{ old('code') }}" required>
                            @error('code') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-aesthetic">⭐ Créditos</label>
                            <input type="number" name="credits" class="form-control aesthetic-input" 
                                   value="{{ old('credits', 0) }}" min="0" required>
                            @error('credits') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-aesthetic">📊 Nivel</label>
                            <select name="level" class="form-control aesthetic-input" required>
                                <option value="básico" {{ old('level') == 'básico' ? 'selected' : '' }}>Básico 🌱</option>
                                <option value="intermedio" {{ old('level') == 'intermedio' ? 'selected' : '' }}>Intermedio 🌸</option>
                                <option value="avanzado" {{ old('level') == 'avanzado' ? 'selected' : '' }}>Avanzado 💫</option>
                            </select>
                            @error('level') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-aesthetic">🎨 Color</label>
                        <input type="color" name="color" value="{{ old('color', '#ff9eb5') }}" 
                               class="form-control-color" style="width: 60px; height: 45px;">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-aesthetic">👩‍🏫 Docentes Asignados</label>
                        <div class="teachers-checkbox">
                            @forelse($teachers as $teacher)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="teachers[]" 
                                       value="{{ $teacher->id }}" id="teacher{{ $teacher->id }}"
                                       {{ in_array($teacher->id, old('teachers', [])) ? 'checked' : '' }}>
                                <label class="form-check-label text-aesthetic" for="teacher{{ $teacher->id }}">
                                    {{ $teacher->name }} - {{ $teacher->specialty }}
                                </label>
                            </div>
                            @empty
                            <p class="text-muted">No hay docentes registrados. 
                                <a href="{{ route('teachers.create') }}">Agregá docentes primero</a>
                            </p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-aesthetic">📝 Descripción</label>
                        <textarea name="description" class="form-control aesthetic-input" rows="3" 
                                  placeholder="Describí los objetivos y contenido de la materia... 📚">{{ old('description') }}</textarea>
                    </div>
                    
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-aesthetic flex-fill">
                            💖 Crear Materia
                        </button>
                        <a href="{{ route('subjects.index') }}" class="btn btn-outline-aesthetic">
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