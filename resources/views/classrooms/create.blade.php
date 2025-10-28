@extends('layouts.app')

@section('title', 'Crear Nueva Aula 💖')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="aesthetic-card p-5">
                <h1 class="gradient-text fw-bold mb-4">✨ Crear Nueva Aula</h1>
                <p class="text-aesthetic mb-4">Diseñá tu espacio perfecto con todos los detalles 💫</p>

                <form action="{{ route('classrooms.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label text-aesthetic">🏷️ Nombre del Aula</label>
                        <input type="text" class="form-control aesthetic-input" id="name" name="name" 
                               placeholder="Ej: Aula 101, Laboratorio de Ciencias..." required>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label text-aesthetic">📍 Ubicación</label>
                        <input type="text" class="form-control aesthetic-input" id="location" name="location" 
                               placeholder="Ej: Primer piso, Ala norte..." required>
                    </div>

                    <div class="mb-3">
                        <label for="capacity" class="form-label text-aesthetic">👥 Capacidad</label>
                        <input type="number" class="form-control aesthetic-input" id="capacity" name="capacity" 
                               min="1" placeholder="Número de personas..." required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label text-aesthetic">📝 Descripción</label>
                        <textarea class="form-control aesthetic-input" id="description" name="description" 
                                  rows="3" placeholder="Contá los detalles especiales de este aula... 🌸"></textarea>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-aesthetic flex-fill">
                            💖 Crear Aula
                        </button>
                        <a href="{{ route('classrooms.index') }}" class="btn btn-outline-aesthetic">
                            ↩️ Volver
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