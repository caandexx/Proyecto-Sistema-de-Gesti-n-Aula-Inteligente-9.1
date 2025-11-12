<?php
// app/Http/Controllers/SubjectController.php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::with('teachers')->latest()->get();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('subjects.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code',
            'color' => 'required|string|max:7',
            'credits' => 'required|integer|min:0|max:20',
            'level' => 'required|in:básico,intermedio,avanzado',
            'description' => 'nullable|string|max:500',
            'teachers' => 'nullable|array',
            'teachers.*' => 'exists:teachers,id'
        ]);

        // Usar transacción para asegurar consistencia
        DB::transaction(function () use ($validated, $request) {
            // Crear la materia
            $subject = Subject::create([
                'name' => $validated['name'],
                'code' => $validated['code'],
                'color' => $validated['color'],
                'credits' => $validated['credits'],
                'level' => $validated['level'],
                'description' => $validated['description'] ?? null,
            ]);

            // Sincronizar teachers si existen
            if (isset($validated['teachers'])) {
                $subject->teachers()->sync($validated['teachers']);
            }
        });

        return redirect()->route('subjects.index')
            ->with('success', '✨ Materia "' . $validated['name'] . '" creada exitosamente! 💖');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        // Cargar la relación de teachers
        $subject->load('teachers');
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        $teachers = Teacher::all();
        // Cargar los teachers actuales para los checkboxes
        $subject->load('teachers');
        return view('subjects.edit', compact('subject', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        // Validación de datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code,' . $subject->id,
            'color' => 'required|string|max:7',
            'credits' => 'required|integer|min:0|max:20',
            'level' => 'required|in:básico,intermedio,avanzado',
            'description' => 'nullable|string|max:500',
            'teachers' => 'nullable|array',
            'teachers.*' => 'exists:teachers,id'
        ]);

        // Usar transacción para asegurar consistencia
        DB::transaction(function () use ($validated, $subject) {
            // Actualizar la materia
            $subject->update([
                'name' => $validated['name'],
                'code' => $validated['code'],
                'color' => $validated['color'],
                'credits' => $validated['credits'],
                'level' => $validated['level'],
                'description' => $validated['description'] ?? null,
            ]);

            // Sincronizar teachers (si no hay teachers, se vacía la relación)
            $subject->teachers()->sync($validated['teachers'] ?? []);
        });

        return redirect()->route('subjects.show', $subject)
            ->with('success', '🌈 Materia "' . $validated['name'] . '" actualizada con estilo! 💫');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subjectName = $subject->name;
        
        // Eliminar relaciones primero y luego la materia
        DB::transaction(function () use ($subject) {
            $subject->teachers()->detach(); // Eliminar relaciones con teachers
            $subject->delete(); // Eliminar la materia
        });

        return redirect()->route('subjects.index')
            ->with('success', '🗑️ Materia "' . $subjectName . '" eliminada exitosamente');
    }

    /**
     * API: Obtener materias en formato JSON (para futuras integraciones)
     */
    public function apiIndex()
    {
        $subjects = Subject::with('teachers')->get();
        return response()->json($subjects);
    }

    /**
     * API: Obtener una materia específica
     */
    public function apiShow(Subject $subject)
    {
        $subject->load('teachers');
        return response()->json($subject);
    }
}