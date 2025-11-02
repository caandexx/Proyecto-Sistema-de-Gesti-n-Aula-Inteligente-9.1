@extends('layouts.app')

@section('title', 'Nueva Reserva 💖')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="aesthetic-card p-5">
                <h1 class="gradient-text fw-bold mb-4">✨ Crear Nueva Reserva</h1>
                <p class="text-aesthetic mb-4">Programá horarios con estilo y sin conflictos ⏰🌈</p>

                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="classroom_id" class="form-label text-aesthetic">🏫 Aula</label>
                            <select class="form-control aesthetic-input" id="classroom_id" name="classroom_id" required>
                                <option value="">Seleccioná un aula...</option>
                                @foreach($classrooms as $classroom)
                                <option value="{{ $classroom->id }}" 
                                        {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                    {{ $classroom->name }} (Capacidad: {{ $classroom->capacity }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="teacher_id" class="form-label text-aesthetic">👩‍🏫 Docente</label>
                            <select class="form-control aesthetic-input" id="teacher_id" name="teacher_id" required>
                                <option value="">Seleccioná un docente...</option>
                                @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" 
                                        {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->name }} - {{ $teacher->specialty }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="subject_id" class="form-label text-aesthetic">📚 Materia</label>
                            <select class="form-control aesthetic-input" id="subject_id" name="subject_id" required>
                                <option value="">Seleccioná una materia...</option>
                                @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}" 
                                        {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                    {{ $subject->name }} ({{ $subject->code }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="reservation_date" class="form-label text-aesthetic">📅 Fecha</label>
                            <input type="date" class="form-control aesthetic-input" id="reservation_date" 
                                   name="reservation_date" value="{{ old('reservation_date', date('Y-m-d')) }}" 
                                   min="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_time" class="form-label text-aesthetic">⏰ Hora de Inicio</label>
                            <select class="form-control aesthetic-input" id="start_time" name="start_time" required>
                                <option value="">Seleccioná hora de inicio...</option>
                                @foreach($timeSlots as $time)
                                <option value="{{ $time }}" {{ old('start_time') == $time ? 'selected' : '' }}>
                                    {{ $time }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="end_time" class="form-label text-aesthetic">⏰ Hora de Fin</label>
                            <select class="form-control aesthetic-input" id="end_time" name="end_time" required>
                                <option value="">Seleccioná hora de fin...</option>
                                @foreach($timeSlots as $time)
                                <option value="{{ $time }}" {{ old('end_time') == $time ? 'selected' : '' }}>
                                    {{ $time }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="student_count" class="form-label text-aesthetic">👥 Cantidad de Estudiantes</label>
                            <input type="number" class="form-control aesthetic-input" id="student_count" 
                                   name="student_count" value="{{ old('student_count') }}" 
                                   min="1" placeholder="Opcional...">
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="recurrence" class="form-label text-aesthetic">🔄 Recurrencia</label>
                            <select class="form-control aesthetic-input" id="recurrence" name="recurrence">
                                <option value="">Una sola vez</option>
                                <option value="semanal" {{ old('recurrence') == 'semanal' ? 'selected' : '' }}>Semanal</option>
                                <option value="mensual" {{ old('recurrence') == 'mensual' ? 'selected' : '' }}>Mensual</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label text-aesthetic">📝 Descripción/Notas</label>
                        <textarea class="form-control aesthetic-input" id="description" name="description" 
                                  rows="3" placeholder="Agregá notas adicionales sobre la reserva... 🌸">{{ old('description') }}</textarea>
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-aesthetic flex-fill">
                            💖 Crear Reserva
                        </button>
                        <a href="{{ route('reservations.index') }}" class="btn btn-outline-aesthetic">
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

<script>
    // Validación básica de horarios
    document.addEventListener('DOMContentLoaded', function() {
        const startTime = document.getElementById('start_time');
        const endTime = document.getElementById('end_time');
        
        function validateTimes() {
            if (startTime.value && endTime.value) {
                if (startTime.value >= endTime.value) {
                    endTime.setCustomValidity('La hora de fin debe ser posterior a la hora de inicio');
                } else {
                    endTime.setCustomValidity('');
                }
            }
        }
        
        startTime.addEventListener('change', validateTimes);
        endTime.addEventListener('change', validateTimes);
    });
</script>
@endsection