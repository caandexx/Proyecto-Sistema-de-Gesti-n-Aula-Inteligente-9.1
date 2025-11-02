<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('teachers')->get();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('subjects.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:subjects|max:10',
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:0',
            'level' => 'required|string|in:básico,intermedio,avanzado',
            'color' => 'required|string',
            'teachers' => 'nullable|array'
        ]);

        $subject = Subject::create($request->all());

        if ($request->has('teachers')) {
            $subject->teachers()->attach($request->teachers);
        }

        return redirect()->route('subjects.index')
            ->with('success', '📚 Materia creada con éxito! Aprendizaje con estilo! 🌟');
    }

    public function show(Subject $subject)
    {
        $subject->load('teachers');
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        $teachers = Teacher::all();
        $subject->load('teachers');
        return view('subjects.edit', compact('subject', 'teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:subjects,code,' . $subject->id,
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:0',
            'level' => 'required|string|in:básico,intermedio,avanzado',
            'color' => 'required|string',
            'teachers' => 'nullable|array'
        ]);

        $subject->update($request->all());

        if ($request->has('teachers')) {
            $subject->teachers()->sync($request->teachers);
        } else {
            $subject->teachers()->detach();
        }

        return redirect()->route('subjects.index')
            ->with('success', '💖 Materia actualizada perfectamente, queen! 📖');
    }

    public function destroy(Subject $subject)
    {
        $subject->teachers()->detach();
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', '🌸 Materia eliminada con todo el estilo! ✨');
    }
}