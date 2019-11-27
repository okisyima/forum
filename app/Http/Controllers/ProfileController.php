<?php

namespace App\Http\Controllers;

use App\User;
use App\forum;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $forums = Forum::where('user_id', $user->id)
            ->paginate(5);

        return view('profile.index', compact('user', 'forums'));
    }
}
