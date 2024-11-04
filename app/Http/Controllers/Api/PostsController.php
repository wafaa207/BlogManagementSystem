<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostVisit;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($Post)
    {
        $post = Post::findOrFail($Post);

        $postVisit = PostVisit::firstOrCreate(
            ['post_id' => $post->id],
            ['visitors' => 0]
        );
    
        $postVisit->increment('visitors');
            
        return response()->json([
            'post' => $post,
            'visitors' => $postVisit->visitors,
        ], 200);
    }

}
