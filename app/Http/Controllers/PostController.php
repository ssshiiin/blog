<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class PostController extends Controller
{
    public function index(Post $post)
    {
        $all = Post::get();
        return view('blogList.index', ["posts" => $all]);
    }
    
    public function getByLimit(){
        $desc10 = Post::orderBy("update_at", "asc")->limit(10)->get();
        return view('blogList.index', ["posts" => $desc10]);
    }
}
