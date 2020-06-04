<?php

namespace App\Policies;

use App\News;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, News $news)
    {
        return $user->admin==1 or true;
    }

    public function create(User $user)
    {
        if(!$user->isAdmin())
            return false;
        return true;
    }

    public function update(User $user, News $news)
    {
        if(!$user->isAdmin())
            return false;
        return true;
    }

    public function delete(User $user, News $news)
    {
        if(!$user->isAdmin())
            return false;
        return true;
    }

}
