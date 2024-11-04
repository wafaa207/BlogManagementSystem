<?php

use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\CommentsController;

use Illuminate\Support\Facades\Route;

// Blog Posts api
Route::resource('/Posts', controller: PostsController::class);


// Comments api
Route::resource('posts.comments', CommentsController::class);

