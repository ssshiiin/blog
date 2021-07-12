<?php

namespace App\Http\Controllers;

use App\Models\Post; 
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;


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
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post){
        return view('edit.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post){
        $editInput = $request['post'];
        $post->fill($editInput)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post){
        $post->delete();
        return redirect('/posts');
    }
    
    public function searchTitle(Request $request, Post $post){
        $search = $request->get("title");
        $hitTitle = $post->getTitleSearchBylimitPaginate($search);
        if ($hitTitle->isEmpty()){
            return redirect('/posts');
        }
        else{
            return view('blogList.index')->with(['posts' => $hitTitle]);
        }
    }

    public function searchPriod(Request $request, Post $post){
        $search = $request->input();
    
        return view('blogList.index')->with(['posts' => $post->getPreviousUpdatetd_atBylimitPaginate($search)]);
    }
}