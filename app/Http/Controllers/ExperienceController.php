<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ExperienceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Experience::all())
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
        return view('backend.pages.experiences.index');
    }

    public function store(Request $request): JsonResponse
    {
        Experience::updateOrCreate(['id'=> $request->id],[
            'user_id' => $request->user_id,
            'company' => $request->company,
            'role' => $request->role,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return response()->json(['success' => true, 'message' => 'Save Experience Successfully.']);
    }

    public function edit($id): JsonResponse
    {
        $experience = Experience::find($id);
        return response()->json($experience);
    }

    public function destroy($id): JsonResponse
    {
        Experience::find($id)->delete();

        return response()->json(['success'=> true, 'message' => 'Project deleted successfully.']);
    }
}
