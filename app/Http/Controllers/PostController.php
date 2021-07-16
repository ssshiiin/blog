<?php

namespace App\Http\Controllers;


use App\Models\Post; 
use App\Models\User;
use App\Models\profile;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\File;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('blogList.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post){
        if(Auth::check()){
            return view('show.show')->with(['post' => $post]);   
        }
        else{
            return redirect('/posts');
        }
    }
    
    public function create(){
        return view('create.create');
    }
    
    public function store(PostRequest $request, Post $post, User $user)
    {
        $input = $request->post;
        $image = $request->file("image");
        
        $path = Storage::disk('s3')->putFile('/PostImage', $image, 'public');
        
        $input += array('user_id'=> $user->id);
        $input += array('image_path'=> Storage::disk('s3')->url($path));
        
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post){
        return view('edit.edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post){
        $editInput = $request['post'];
        $editimage = $request->file("image");
        
        $path = Storage::disk('s3')->putFile('/PostImage', $editimage, 'public');
        
        $editInput += array('image_path'=> Storage::disk('s3')->url($path));
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
    
    public function mypage(User $user){
        $posts = $user->post;
        return view("mypage.mypage")->with(["posts" => $posts, "user"=>$user]);
    }
    
    public function userpage(User $user){
        $posts = $user->post;
        return view("userpage.userpage")->with(["posts" => $posts, "user"=>$user]);
    }
    
    public function profile(){
        return view("createProfile.createProfile");
    }
    
    public function createProfile(Request $request, User $user, profile $profile){
        $posts = $user->post;
        $inputProfile = $request->get("profileContent");
        $profile->fill(["profile"=>$inputProfile, "user_id"=>$user->id])->save();
        return redirect("/mypage/$user->id");
    }
}