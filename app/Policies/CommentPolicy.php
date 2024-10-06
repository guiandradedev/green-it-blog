<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('comment');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Comment $post): bool
    {
        if($post->owner_id == $user->id) {
            return $user->can('delete comment');
        }
        
        return $user->can('delete any comment');
    }

}
