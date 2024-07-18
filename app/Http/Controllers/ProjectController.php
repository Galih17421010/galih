<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Project::all())
                ->addColumn('action', function($p){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$p->id.'" title="Edit" class="btn btn-icon btn-text-info rounded-pill waves-effect editBtn">
                            <i class="ri-edit-box-line"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$p->id.'" title="Delete" class="btn btn-icon btn-text-danger rounded-pill waves-effect deleteBtn">
                            <i class="ri-delete-bin-7-line"></i>
                        </a>';
                return $btn;
            })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.projects.index');
    }

    public function store(Request $request): JsonResponse
    {
        Project::updateOrCreate(['id'=> $request->id],[
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'project_url' => $request->project_url,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return response()->json(['success' => true, 'message' => 'Save Project Successfully.']);
    }


    public function show(Project $project)
    {
         return view('backend.pages.projects.show', compact('project'));
    }


    public function edit($id): JsonResponse
    {
        $project = Project::find($id);
        return response()->json($project);
    }

    public function destroy($id): JsonResponse
    {
        Project::find($id)->delete();

        return response()->json(['success'=>'Project deleted successfully.']);
    }
}
