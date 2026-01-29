<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeStoreRequest;
use App\Http\Requests\GradeUpdateRequest;
use App\Models\Grade;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Grade::class, 'grade');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::paginate(10);

        return view('pages.grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeStoreRequest $request)
    {
        $validated = $request->validated();

        Grade::create($validated);

        return redirect()->route('grades.index')->with('success', 'Grade succesfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        return view('pages.grades.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('pages.grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeUpdateRequest $request, Grade $grade)
    {
        $validated = $request->validated();

        $grade->update($validated);

        return redirect()->route('grades.index')->with('success', 'Grade updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
