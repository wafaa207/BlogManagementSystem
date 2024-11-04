<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{

    public function index()
    {
        $user  = Auth::user();
        $posts = Post::where('status', 'published')->orderBy('created_at', 'desc')->limit(3)->get();
        
        $authors = User::inRandomOrder()->limit(3)->get();

        return view('front.pages.home' , compact('posts', 'authors'));
    }

}
