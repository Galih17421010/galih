<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Tag::all())
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
        return view('backend.pages.blog.categorietag.index');
    }
}
