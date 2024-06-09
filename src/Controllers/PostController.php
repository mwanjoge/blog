<?php

namespace Nisimpo\Blog\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Nisimpo\Blog\Models\Category;
use Nisimpo\Blog\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index(){
        $posts = Post::orderBy('id','desc')->get();
        return view('blog::posts.index',compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('blog::posts.create',compact('categories'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $slug = Str::of($request->title)->snake();
        $post = Post::create($request->all());
        $post->slug = $slug;
        $post->published_at = $request->published_at ?? now();
        $post->save();
        $path = $request->image->storeAs('posts', $post->id.'.'.$request->image->extension(),'public');

        if($request->image->extension() == 'pdf'){
            $path = $request->image->storeAs('reports',$post->id.'.'.$request->image->extension(),'public');
        }
        $post->image = $path;
        $post->save();

        alert()->success('Success'," '$request->title' saved successfully");
        return redirect()->route('posts.index');
    }

    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view('blog::posts.edit',compact('categories','post'));
    }

    public function update($id, Request $request){
        $post = Post::find($id);
        $post->update($request->all());
        if(!is_null($request->image)){
            if($request->image->isValid()){
                $path = $request->image->storeAs('posts', $post->id.'.'.$request->image->extension(),'public');
                $post->image = $path;
            }
        }

        $post->save();
        return back();
    }

    public function show($id){
        $post = Post::find($id);
        return back();
    }
}