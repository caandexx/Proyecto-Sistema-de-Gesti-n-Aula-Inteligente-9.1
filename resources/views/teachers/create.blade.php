@extends('layouts.app')

@section('title', 'Agregar Docente 💖')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="aesthetic-card p-5">
                <h1 class="gradient-text fw-bold mb-4">✨ Agregar Nuevo Docente</h1>
                <p class="text-aesthetic mb-4">Sumá talento a tu equipo educativo con todos los detalles 💫</p>

                <form action="{{ route('teachers.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label text-aesthetic">👤 Nombre Completo</label>
                        <input type="text" class="form-control aesthetic-input" id="name" name="name" 
                               placeholder="Ej: María González..." required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-aesthetic">📧 Email</label>
                        <input type="email" class="form-control aesthetic-input" id="email" name="email" 
                               placeholder="ejemplo@escuela.edu..." required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label text-aesthetic">📞 Teléfono</label>
                        <input type="text" class="form-control aesthetic-input" id="phone" name="phone" 
                               placeholder="+54 11 1234-5678...">
                    </div>

                    <div class="mb-3">
                        <label for="specialty" class="form-label text-aesthetic">🎓 Especialidad</label>
                        <input type="text" class="form-control aesthetic-input" id="specialty" name="specialty" 
                               placeholder="Ej: Matemáticas, Programación, Ciencias..." required>
                    </div>

                    <div class="mb-4">
                        <label for="bio" class="form-label text-aesthetic">📝 Biografía</label>
                        <textarea class="form-control aesthetic-input" id="bio" name="bio" 
                                  rows="4" placeholder="Contá sobre la experiencia y especialidades del docente... 🌸"></textarea>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-aesthetic flex-fill">
                            💖 Agregar Docente
                        </button>
                        <a href="{{ route('teachers.index') }}" class="btn btn-outline-aesthetic">
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