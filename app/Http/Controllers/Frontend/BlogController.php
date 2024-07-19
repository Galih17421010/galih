<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        return view('frontend.pages.blog.index');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return view('frontend.pages.blog.read');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
