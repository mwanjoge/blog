<?php

function getLayoutSections()
{
    return \Nisimpo\Blog\Models\Category::with('categories')->where('name','Layout')->get()->first();
}

function getPostBySlug($slug)
{
    return \Nisimpo\Blog\Models\Post::where('slug',$slug)->get()->first();
}