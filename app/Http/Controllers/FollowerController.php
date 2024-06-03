<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Follower;
use Auth;

class FollowerController extends Controller
{
    public function follow($userId)
    {
        Follower::create([
            'user_id' => $userId,
            'follower_id' => Auth::id()
        ]);

        return redirect()->back();
    }

    public function unfollow($userId)
    {
        Follower::where('user_id', $userId)->where('follower_id', Auth::id())->delete();

        return redirect()->back();
    }
}
