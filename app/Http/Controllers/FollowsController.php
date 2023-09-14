<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware(('auth'));
    }

    public function store(User $user)
    {
        // When click button will follow -> toggle -> when click button will unfollow
        return auth()->user()->following()->toggle($user->profile);
    }
}
