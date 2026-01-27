<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionStoreRequest;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Section::class, 'section');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::where('user_id', auth()->user()->id)->paginate(10);

        return view('pages.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionStoreRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->sections()->create($validated);

        return redirect()->route('sections.index')->with('success', 'Section successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return view('pages.sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        return view('pages.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $validated = $request->validated();

        $section->update($validated);

        return redirect()->route('sections.index')->with('success', 'Section successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Section successfully deleted.');
    }
}
