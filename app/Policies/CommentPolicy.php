<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if(auth()->user()){
            return true;
        }
        return false;
    }

    public function view(User $user, Comment $comment)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Comment $comment)
    {
        //
    }

    public function delete(User $user, Comment $comment)
    {
        if(Comment::where([['news_id','=',$comment->news_id],['user_id','=',$user->id]])->first()){

            return true;
        }
        return false;
    }

}
