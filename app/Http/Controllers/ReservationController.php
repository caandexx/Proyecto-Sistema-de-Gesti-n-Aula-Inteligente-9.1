<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['classroom', 'teacher', 'subject'])
            ->orderBy('reservation_date', 'desc')
            ->orderBy('start_time', 'desc')
            ->get();

        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $classrooms = Classroom::where('status', 'active')->get();
        $teachers = Teacher::all();
        $subjects = Subject::all();

        // Horarios sugeridos (8:00 AM - 10:00 PM en intervalos de 1 hora)
        $timeSlots = [];
        for ($hour = 8; $hour <= 22; $hour++) {
            $timeSlots[] = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
        }

        return view('reservations.create', compact('classrooms', 'teachers', 'subjects', 'timeSlots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'reservation_date' => 'required|date|after_or_equal:today',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'description' => 'nullable|string',
            'student_count' => 'nullable|integer|min:1',
            'recurrence' => 'nullable|in:única,semanal,mensual'
        ]);

        // Crear instancia para verificar conflictos
        $reservation = new Reservation($request->all());
        
        // Verificar conflictos de horario
        if ($reservation->hasTimeConflict()) {
            return back()
                ->withInput()
                ->with('error', '⏰ ¡Conflicto de horario! El aula ya está reservada en ese horario. 💫');
        }

        // Verificar capacidad del aula
        $classroom = Classroom::find($request->classroom_id);
        if ($request->student_count && $request->student_count > $classroom->capacity) {
            return back()
                ->withInput()
                ->with('error', '👥 ¡Capacidad excedida! El aula solo tiene capacidad para ' . $classroom->capacity . ' personas. 🌸');
        }

        Reservation::create($request->all());

        return redirect()->route('reservations.index')
            ->with('success', '📅 Reserva creada con éxito! Todo organizado con estilo! 💖');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load(['classroom', 'teacher', 'subject']);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $classrooms = Classroom::where('status', 'active')->get();
        $teachers = Teacher::all();
        $subjects = Subject::all();

        $timeSlots = [];
        for ($hour = 8; $hour <= 22; $hour++) {
            $timeSlots[] = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
        }

        return view('reservations.edit', compact('reservation', 'classrooms', 'teachers', 'subjects', 'timeSlots'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'reservation_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'description' => 'nullable|string',
            'student_count' => 'nullable|integer|min:1',
            'recurrence' => 'nullable|in:única,semanal,mensual',
            'status' => 'required|in:pendiente,confirmada,cancelada'
        ]);

        // Verificar conflictos de horario (excluyendo la reserva actual)
        $conflict = Reservation::where('classroom_id', $request->classroom_id)
            ->where('reservation_date', $request->reservation_date)
            ->where('id', '!=', $reservation->id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('start_time', '<=', $request->start_time)
                            ->where('end_time', '>=', $request->end_time);
                    });
            })
            ->exists();

        if ($conflict) {
            return back()
                ->withInput()
                ->with('error', '⏰ ¡Conflicto de horario! El aula ya está reservada en ese horario. 💫');
        }

        $reservation->update($request->all());

        return redirect()->route('reservations.index')
            ->with('success', '💖 Reserva actualizada perfectamente, queen! 👑');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', '🌸 Reserva eliminada con todo el estilo! ✨');
    }

    // Método adicional para confirmar reservas
    public function confirm(Reservation $reservation)
    {
        $reservation->update(['status' => 'confirmada']);

        return back()->with('success', '✅ Reserva confirmada con éxito! 🌟');
    }

    // Método adicional para cancelar reservas
    public function cancel(Reservation $reservation)
    {
        $reservation->update(['status' => 'cancelada']);

        return back()->with('success', '🔄 Reserva cancelada. 💫');
    }
}