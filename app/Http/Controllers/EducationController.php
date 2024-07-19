<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Education::all())
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
        return view('backend.pages.educations.index');
    }

    public function store(Request $request)
    {
        Education::updateOrCreate(['id'=> $request->id],[
            'user_id' => $request->user_id,
            'institution' => $request->institution,
            'degree' => $request->degree,
            'field_of_study' => $request->field_of_study,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return response()->json(['success' => true, 'message' => 'Save Education Successfully.']);
    }

    public function edit($id): JsonResponse
    {
        $experience = Education::find($id);
        return response()->json($experience);
    }

    public function destroy($id): JsonResponse
    {
        Education::find($id)->delete();

        return response()->json(['success'=> true, 'message' => 'Education deleted successfully.']);
    }
}

