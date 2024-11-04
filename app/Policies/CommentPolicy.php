<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;

class CommentPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Comment $comment)
    {
        return $user->hasRole('admin');
    }

    public function create(User $user)
    {
        return $user->hasRole('admin');
    }

    public function update(User $user, Comment $comment)
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->hasRole('admin');
    }

    public function restore(User $user, Comment $comment)
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Comment $comment)
    {
        return $user->hasRole('admin');
    }
}
