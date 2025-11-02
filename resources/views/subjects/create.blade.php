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
                    
                    <div class="mb-3">
                        <label class="form-label text-aesthetic">📖 Nombre</label>
                        <input type="text" name="name" class="form-control aesthetic-input" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-aesthetic">🔢 Código</label>
                        <input type="text" name="code" class="form-control aesthetic-input" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label text-aesthetic">🎨 Color</label>
                        <input type="color" name="color" value="#ff9eb5" class="form-control-color">
                    </div>
                    
                    <button type="submit" class="btn btn-aesthetic w-100">💖 Crear Materia</button>
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
    }
</style>
@endsection