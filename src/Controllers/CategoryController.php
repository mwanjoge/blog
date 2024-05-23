<?php

namespace Nisimpo\Blog\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Nisimpo\Blog\Models\Category;

class CategoryController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        return view('blog::categories.index', compact('categories'));
    }

    public function store(Request $request){
        Category::create($request->all());
        return back();
    }
}