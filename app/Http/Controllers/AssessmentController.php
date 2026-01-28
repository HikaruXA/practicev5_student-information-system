<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentStoreRequest;
use App\Http\Requests\AssessmentUpdateRequest;
use App\Models\Assessment;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assessments = Assessment::paginate(10);

        return view('pages.assessments.index', compact('assessments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.assessments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssessmentStoreRequest $request)
    {
        $validated = $request->validated();

        Assessment::create($validated);

        return redirect()->route('assessments.index')->with('success', 'Assessment created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment)
    {
        return view('pages.assessments.show', compact('assessment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assessment $assessment)
    {
        return view('pages.sections.edit', compact('assessment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssessmentUpdateRequest $request, Assessment $assessment)
    {
        $validated = $request->validated();

        $assessment->update($validated);

        return redirect()->route('assessments.index')->with('success', 'Assessment updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessment)
    {
        $assessment->delete();

        return redirect()->route('assessments.index')->with('success', 'Assessment deleted successfully');
    }
}
