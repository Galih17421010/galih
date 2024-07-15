<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('backend.pages.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('backend.pages.educations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution' => 'required',
            'degree' => 'required',
            'field_of_study' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Education::create($request->all());

        return redirect()->route('backend.pages.educations.index')
                         ->with('success', 'Education created successfully.');
    }

    public function show(Education $education)
    {
        return view('backend.pages.educations.show', compact('education'));
    }

    public function edit(Education $education)
    {
        return view('backend.pages.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institution' => 'required',
            'degree' => 'required',
            'field_of_study' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $education->update($request->all());

        return redirect()->route('backend.pages.educations.index')
                         ->with('success', 'Education updated successfully.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('backend.pages.educations.index')
                         ->with('success', 'Education deleted successfully.');
    }
}

