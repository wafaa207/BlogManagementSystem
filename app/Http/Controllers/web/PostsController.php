<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\PostVisit;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Request $request, $Post)
    {
        $post = Post::findOrFail($Post);

        $postVisit = PostVisit::firstOrCreate(
            ['post_id' => $post->id],
            ['visitors' => 0]
        );
    
        $postVisit->increment('visitors');
            
        return view('front.pages.fullPost', compact('post'));
    }

}
