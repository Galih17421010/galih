<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return view('backend.pages.blog.article.index');
    }
}
