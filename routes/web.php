<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas PÚBLICAS para aulas
Route::resource('classrooms', ClassroomController::class);

// Rutas PÚBLICAS para docentes
Route::resource('teachers', TeacherController::class);

// Dashboard público
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');