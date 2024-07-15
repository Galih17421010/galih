<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('backend.pages.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('backend.pages.experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Experience::create($request->all());

        return redirect()->route('backend.pages.experiences.index')
                         ->with('success', 'Experience created successfully.');
    }

    public function show(Experience $experience)
    {
        return view('backend.pages.experiences.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('backend.pages.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'company' => 'required',
            'role' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $experience->update($request->all());

        return redirect()->route('backend.pages.experiences.index')
                         ->with('success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('backend.pages.experiences.index')
                         ->with('success', 'Experience deleted successfully.');
    }
}
