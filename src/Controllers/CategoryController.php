<?php

namespace Nisimpo\Blog\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Nisimpo\Blog\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        return view('blog::categories.index', compact('categories'));
    }

    public function store(Request $request){
        $input = $request->all();
        $input['slug'] = Str::lower(Str::of($request->name)->snake()) ;
        Category::create($input);
        alert()->success('Title','Lorem Lorem Lorem');
        return back();
    }
}