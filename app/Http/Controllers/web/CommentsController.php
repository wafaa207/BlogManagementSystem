<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CommentNotification;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request, $postId)
    {
        $user = Auth::user();

        $comment = new Comment();
        $comment->content = $request->text;
        $comment->user_id = $user->id;
        $comment->post_id = $postId;
        $comment->save();

        session()->flash('success', 'The Comment Added Successfully !!');
        return redirect()->back();
    }

    public function update(UpdateCommentRequest $request)
    {
        $comment = Comment::findOrFail($request->comment);

        if (Auth::user()->id == $comment->user_id) {
            $comment->update([
                'content' => $request->text,
            ]);

            session()->flash('success', 'The Comment Updated Successfully !!');
            return redirect()->back();
        } else {
            session()->flash('error', 'You are not allowed to perform this action !!');
            return redirect()->back();
        }
    }


    public function destroy(Request $request){
        $comment = Comment::findOrFail($request->comment);

        if(Auth::user()->type == 'Admin' || (Auth::user()->id == $comment->user_id)) {
            $comment->delete();
            session()->flash('success', 'The Comment Deleted Successfully !!');
            return redirect()->back();
        }else{
            session()->flash('error', 'You are not allowed to perform this action !!');
            return redirect()->back();
        }
    }

    public function report(Request $request, $postId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        $comment->increment('reports');

        session()->flash('success' , 'Comment reported successfully !!');
        return redirect()->back();
    }

}
