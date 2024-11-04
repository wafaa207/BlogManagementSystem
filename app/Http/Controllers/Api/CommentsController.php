<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $user = Auth::user();

        $comment = Comment::create([
            'content' => $request->text,
            'user_id' => $user->id,
            'post_id' => $request->post,
        ]);

        return response()->json([
            'message' => 'Comment added successfully',
            'comment' => $comment,
        ], 201);
    }


    public function update(UpdateCommentRequest $request)
    {
        $comment = Comment::findOrFail($request->comment);

        if (Auth::id() !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->update([
            'content' => $request->text,
        ]);

        return response()->json([
            'message' => 'Comment updated successfully',
            'comment' => $comment,
        ], 200);
    }


    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (Auth::user()->type !== 'Admin' && Auth::id() !== $comment->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
