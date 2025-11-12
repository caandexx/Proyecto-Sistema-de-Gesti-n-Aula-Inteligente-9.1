<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Datos reales de la base de datos
        $totalClassrooms = Classroom::count();
        $totalTeachers = Teacher::count();
        $totalSubjects = Subject::count();
        $totalReservations = Reservation::count();
        
        $activeClassrooms = Classroom::where('status', 'active')->count();
        $todayReservations = Reservation::whereDate('reservation_date', today())->count();
        $confirmedReservations = Reservation::where('status', 'confirmada')->count();
        
        // Aulas recientemente creadas (últimas 5)
        $recentClassrooms = Classroom::latest()->take(5)->get();
        
        // Docentes recientes (últimos 5)
        $recentTeachers = Teacher::latest()->take(5)->get();
        
        // Materias recientes (últimas 5) con sus docentes
        $recentSubjects = Subject::with('teachers')->latest()->take(5)->get();
        
        // Reservas recientes (últimas 5) con relaciones
        $recentReservations = Reservation::with(['classroom', 'teacher', 'subject'])
            ->latest()
            ->take(5)
            ->get();

        // Reservas de hoy
        $todayReservationsList = Reservation::with(['classroom', 'teacher', 'subject'])
            ->whereDate('reservation_date', today())
            ->orderBy('start_time')
            ->get();

        // Estadísticas para gráficos
        $classroomStats = [
            'active' => $activeClassrooms,
            'inactive' => $totalClassrooms - $activeClassrooms,
        ];

        // Estadísticas de reservas por estado
        $reservationStats = [
            'confirmada' => Reservation::where('status', 'confirmada')->count(),
            'pendiente' => Reservation::where('status', 'pendiente')->count(),
            'cancelada' => Reservation::where('status', 'cancelada')->count(),
        ];

        // Próximas reservas (de hoy en adelante)
        $upcomingReservations = Reservation::with(['classroom', 'teacher', 'subject'])
            ->whereDate('reservation_date', '>=', today())
            ->where('status', 'confirmada')
            ->orderBy('reservation_date')
            ->orderBy('start_time')
            ->take(3)
            ->get();

        return view('dashboard', compact(
            'totalClassrooms',
            'totalTeachers', 
            'totalSubjects',
            'totalReservations',
            'activeClassrooms',
            'todayReservations',
            'confirmedReservations',
            'recentClassrooms',
            'recentTeachers',
            'recentSubjects',
            'recentReservations',
            'todayReservationsList',
            'upcomingReservations',
            'classroomStats',
            'reservationStats'
        ));
    }
}