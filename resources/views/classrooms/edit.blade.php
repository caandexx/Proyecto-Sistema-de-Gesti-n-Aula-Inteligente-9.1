@extends('layouts.app')

@section('title', 'Editar ' . $classroom->name . ' 💖')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="aesthetic-card p-5">
                <h1 class="gradient-text fw-bold mb-4">✏️ Editar {{ $classroom->name }}</h1>
                <p class="text-aesthetic mb-4">Actualizá los detalles de esta aula con estilo aesthetic ✨</p>

                <form action="{{ route('classrooms.update', $classroom) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label text-aesthetic">🏷️ Nombre del Aula</label>
                        <input type="text" class="form-control aesthetic-input" id="name" name="name" 
                               value="{{ $classroom->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label text-aesthetic">📍 Ubicación</label>
                        <input type="text" class="form-control aesthetic-input" id="location" name="location" 
                               value="{{ $classroom->location }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="capacity" class="form-label text-aesthetic">👥 Capacidad</label>
                        <input type="number" class="form-control aesthetic-input" id="capacity" name="capacity" 
                               value="{{ $classroom->capacity }}" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label text-aesthetic">📊 Estado</label>
                        <select class="form-control aesthetic-input" id="status" name="status">
                            <option value="active" {{ $classroom->status == 'active' ? 'selected' : '' }}>Activa 🟢</option>
                            <option value="inactive" {{ $classroom->status == 'inactive' ? 'selected' : '' }}>Inactiva 🔴</option>
                            <option value="maintenance" {{ $classroom->status == 'maintenance' ? 'selected' : '' }}>Mantenimiento 🛠️</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label text-aesthetic">📝 Descripción</label>
                        <textarea class="form-control aesthetic-input" id="description" name="description" 
                                  rows="3" placeholder="Contá los detalles especiales de este aula... 🌸">{{ $classroom->description }}</textarea>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-aesthetic flex-fill">
                            💖 Actualizar Aula
                        </button>
                        <a href="{{ route('classrooms.show', $classroom) }}" class="btn btn-outline-aesthetic">
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
</style>
@endsection