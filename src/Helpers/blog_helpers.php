<?php

function getLayoutSections()
{
    return \Nisimpo\Blog\Models\Category::with('categories')->where('name','Layout')->get()->first();
}

function getPostBySlug($slug)
{
    return \Nisimpo\Blog\Models\Post::where('slug',$slug)
        ->where('lang',session()->get('locale'))
        ->get()->first();
}

function getPostByCategory($categoryName)
{
    return \Nisimpo\Blog\Models\Category::with('posts')->where('name',$categoryName)->get()->first()->posts;
}

function getLatestPostList(int $limit = 3, string $slug = null){
    $posts =  \Nisimpo\Blog\Models\Post::select('posts.*');
    if(!is_null($slug)){
        $posts->join('categories','posts.category_id','categories.id')
            ->where('categories.slug','news_section');
    }
    $posts->orderBy('posts.id','desc')->limit($limit)->get();
    return $posts;
}

function getCategories($parent){
    return \Nisimpo\Blog\Models\Category::with('categories')->where('name',$parent)->get()->first()->categories;
}