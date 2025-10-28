<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'phone' => 'nullable|string|max:20',
            'specialty' => 'required|string|max:255',
            'bio' => 'nullable|string'
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index')
            ->with('success', '👩‍🏫 Docente creado con éxito! Brillás como siempre! 💫');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:20',
            'specialty' => 'required|string|max:255',
            'bio' => 'nullable|string'
        ]);

        $teacher->update($request->all());

        return redirect()->route('teachers.index')
            ->with('success', '💖 Docente actualizado perfectamente, queen! 👑');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')
            ->with('success', '🌸 Docente eliminado con todo el estilo! ✨');
    }
}