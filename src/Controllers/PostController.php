<?php

namespace Nisimpo\Blog\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Nisimpo\Blog\Models\Category;
use Nisimpo\Blog\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('blog::posts.index',compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        return view('blog::posts.create',compact('categories'));
    }

    public function store(Request $request){
        $slug = Str::of($request->title)->snake();
        $post = Post::create($request->all());
        $post->slug = $slug;
        $post->published_at = $request->published_at??now();
        $post->save();
        return redirect()->route('posts.index');
    }
}