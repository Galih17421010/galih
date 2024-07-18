<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use File;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Skill::all())
            ->addColumn('image', function($p){
                $img = '<div class="avatar avatar-sm">
                            <img src="'.$p->image.'" alt="'.$p->name.'" class="rounded-circle">
                        </div>';
                return $img;
            })
            ->addColumn('action', function($p){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$p->id.'" title="Edit" class="btn btn-icon btn-text-info rounded-pill waves-effect editBtn">
                            <i class="ri-edit-box-line"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$p->id.'" title="Delete" class="btn btn-icon btn-text-danger rounded-pill waves-effect deleteBtn">
                            <i class="ri-delete-bin-7-line"></i>
                        </a>';
                return $btn;
            })
                ->rawColumns(['image','action'])
                ->make(true);

        }
        return view('backend.pages.skills.index');
    }

    public function store(Request $request): JsonResponse
    {

        $skill = Skill::updateOrCreate (['id'=> $request->id ],[
            'user_id' => $request->user_id,
            'name' => $request->name,
            'level' => $request->level,
        ]);
        if ($request->hasFile('image')) {
            $dir = $skill->image;
            if (File::exists($dir)){
                File::delete($dir);
            };
            $image = $request->file('image');
            $destinationPath = 'images\skills';
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $url = $image->move($destinationPath, $imageName);
            $skill->image = $url;
        }
        $skill->save();
        return response()->json(['success' => true, 'message' => 'Save Skill Successfully.']);
    }

    public function edit($id): JsonResponse
    {
        $skill = Skill::find($id);
        return response()->json($skill);
    }

    public function destroy($id): JsonResponse
    {
        $skill = Skill::findOrFail($id);
        $dir = $skill->image;
        File::delete($dir);
        $skill->delete();

        return response()->json(['success'=> true, 'message' => 'Skill deleted successfully.']);
    }
}
