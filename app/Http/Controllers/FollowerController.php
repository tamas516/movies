<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(Movie $movie)
    {
        $follower = auth()->user();
        $follower->followings()->attach($movie);

        return redirect()->route('profile')->with('success', $movie->title . ' followed successfully!');
    }

    public function unfollow(Movie $movie)
    {
        $follower = auth()->user();
        $follower->followings()->detach($movie);

        return redirect()->route('profile')->with('success', $movie->title . ' unfollowed successfully!');
    }
}
