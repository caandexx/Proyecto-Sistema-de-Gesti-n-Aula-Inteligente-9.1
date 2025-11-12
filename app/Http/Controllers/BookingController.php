<?php
// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['classroom', 'subject', 'teacher'])
            ->orderBy('date', 'desc')
            ->orderBy('start_time', 'desc')
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('bookings.create', compact('classrooms', 'subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'classroom_id' => 'required|exists:classrooms,id',
            'subject_id' => 'nullable|exists:subjects,id',
            'teacher_id' => 'nullable|exists:teachers,id',
            'attendees' => 'required|integer|min:1'
        ]);

        // Verificar disponibilidad
        $conflictingBooking = Booking::where('classroom_id', $validated['classroom_id'])
            ->where('date', $validated['date'])
            ->where(function($query) use ($validated) {
                $query->whereBetween('start_time', [$validated['start_time'], $validated['end_time']])
                      ->orWhereBetween('end_time', [$validated['start_time'], $validated['end_time']]);
            })
            ->where('status', 'confirmed')
            ->first();

        if ($conflictingBooking) {
            return back()->withErrors([
                'classroom_id' => 'El aula no está disponible en ese horario. 💫'
            ])->withInput();
        }

        Booking::create($validated);

        return redirect()->route('bookings.index')
            ->with('success', '✨ Reserva creada exitosamente! 🗓️');
    }

    public function show(Booking $booking)
    {
        $booking->load(['classroom', 'subject', 'teacher']);
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('bookings.edit', compact('booking', 'classrooms', 'subjects', 'teachers'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'classroom_id' => 'required|exists:classrooms,id',
            'subject_id' => 'nullable|exists:subjects,id',
            'teacher_id' => 'nullable|exists:teachers,id',
            'status' => 'required|in:pending,confirmed,cancelled',
            'attendees' => 'required|integer|min:1'
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.show', $booking)
            ->with('success', '🌈 Reserva actualizada con estilo! 💫');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', '🗑️ Reserva eliminada exitosamente');
    }

    public function calendar()
    {
        $bookings = Booking::with(['classroom', 'subject', 'teacher'])
            ->where('status', 'confirmed')
            ->get();

        return view('bookings.calendar', compact('bookings'));
    }
}