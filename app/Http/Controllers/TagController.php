<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Tag::all())
                ->addColumn('action', function($p){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$p->id.'" title="Edit" class="btn btn-icon btn-text-info rounded-pill waves-effect editBtnTag">
                            <i class="ri-edit-box-line"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$p->id.'" title="Delete" class="btn btn-icon btn-text-danger rounded-pill waves-effect deleteBtnTag">
                            <i class="ri-delete-bin-7-line"></i>
                        </a>';
                return $btn;
            })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.pages.blog.categorietag.index');
    }

    public function store(Request $request): JsonResponse
    {
        Tag::updateOrCreate(['id'=> $request->idtag],[
            'name' => $request->nametag,
            'slug' => $request->slugtag
        ]);

        return response()->json(['success' => true, 'message' => 'Your Tag has been saved']);
    }

    public function edit($id): JsonResponse
    {
        $tag = Tag::find($id);
        return response()->json($tag);
    }

    public function destroy($id): JsonResponse
    {
        Tag::find($id)->delete();

        return response()->json(['success'=> true, 'message' => 'Tag deleted successfully.']);
    }
}
