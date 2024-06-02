<?php

function getLayoutSections()
{
    return \Nisimpo\Blog\Models\Category::with('categories')->where('name','Layout')->get()->first();
}

function getPostBySlug($slug)
{
    return \Nisimpo\Blog\Models\Post::where('slug',$slug)->get()->first();
}

function getPostByCategory($categoryName)
{
    return \Nisimpo\Blog\Models\Category::with('posts')->where('name',$categoryName)->get()->first()->posts;
}

function getLatestPostList($limit = 3){
    return \Nisimpo\Blog\Models\Post::orderBy('id','desc')->limit($limit)->get();
}