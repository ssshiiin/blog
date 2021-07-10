<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('blogList.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post){
        return view('show.show')->with(['post' => $post]);
    }
    
    public function create(){
        return view('create.create');
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}