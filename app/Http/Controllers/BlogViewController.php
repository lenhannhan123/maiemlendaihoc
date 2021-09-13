<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogViewController extends Controller
{
    function index(){
        $data = Blog::paginate(6);
        return view('blog', compact('data'));
    }
}
