<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas CRUD para aulas
Route::resource('classrooms', ClassroomController::class);

// Rutas CRUD para docentes  
Route::resource('teachers', TeacherController::class);

// Rutas CRUD para materias
Route::resource('subjects', SubjectController::class);

// Rutas CRUD para reservas (BOOKINGS - el nuevo sistema)
Route::resource('bookings', BookingController::class);
Route::get('/bookings-calendar', [BookingController::class, 'calendar'])->name('bookings.calendar');

// Rutas CRUD para reservas (RESERVATIONS - el antiguo, por si lo necesitás)
Route::resource('reservations', ReservationController::class);
Route::patch('/reservations/{reservation}/confirm', [ReservationController::class, 'confirm'])->name('reservations.confirm');
Route::patch('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Ruta de login temporal
Route::get('/login', function () {
    return "🔐 Página de Login - Próximamente...";
});