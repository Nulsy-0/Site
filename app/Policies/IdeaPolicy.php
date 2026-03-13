<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    public function isUserIdea(User $user, Idea $idea)
    {
        return $user->is($idea->user) ? Response::allow() : Response::denyAsNotFound();
    }
}