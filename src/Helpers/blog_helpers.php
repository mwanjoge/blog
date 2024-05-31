<?php

function getLayoutSections()
{
    return \Nisimpo\Blog\Models\Category::with('categories')->where('name','Layout')->get()->first();
}