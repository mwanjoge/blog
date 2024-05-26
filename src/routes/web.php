<?php

use Illuminate\Support\Facades\Route;
use Nisimpo\Blog\Controllers\CategoryController;

//Route::middleware(['auth'])->group(function() {
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', \Nisimpo\Blog\Controllers\PostController::class);
//});