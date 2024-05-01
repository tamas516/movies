<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieLikeController extends Controller
{
    public function like(Movie $movie)
    {
        $liker = auth()->user();
        $liker->likes()->attach($movie);

        return redirect()->route('main')->with('success', 'Liked Successfully!');
    }

    public function unlike(Movie $movie)
    {
        $liker = auth()->user();
        $liker->likes()->detach($movie);

        return redirect()->route('main')->with('success', 'UnLiked Successfully!');
    }
}
