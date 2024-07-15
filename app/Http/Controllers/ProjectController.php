<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('backend.pages.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('backend.pages.projects.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_url' => 'required|url',
        ]);

        Project::create($request->all());

        return redirect()->route('backend.pages.projects.index')
                         ->with('success', 'Project created successfully.');
    }


    public function show(Project $project)
    {
         return view('backend.pages.projects.show', compact('project'));
    }


    public function edit(Project $project)
    {
        return view('backend.pages.projects.edit', compact('project'));
    }


    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_url' => 'required|url',
        ]);

        $project->update($request->all());

        return redirect()->route('backend.pages.projects.index')
                         ->with('success', 'Project updated successfully.');
    }


    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('backend.pages.projects.index')
                         ->with('success', 'Project deleted successfully.');
    }
}
