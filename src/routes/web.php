<?php

use Illuminate\Support\Facades\Route;
use Nisimpo\Blog\Controllers\CategoryController;

Route::resource('categories',CategoryController::class);
Route::resource('posts',\Nisimpo\Blog\Controllers\PostController::class);