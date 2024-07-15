<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('backend.pages.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('backend.pages.skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
        ]);

        Skill::create($request->all());

        return redirect()->route('backend.pages.skills.index')
                         ->with('success', 'Skill created successfully.');
    }

    public function show(Skill $skill)
    {
        return view('backend.pages.skills.show', compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view('backend.pages.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
        ]);

        $skill->update($request->all());

        return redirect()->route('backend.pages.skills.index')
                         ->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()->route('backend.pages.skills.index')
                         ->with('success', 'Skill deleted successfully.');
    }
}
