<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Movie $movie)
    {
        $comment = new Comment();
        $comment->movie_id = $movie->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        if(empty(request()->get('content')))
        {
            return redirect()->route('main')->with('danger','Comment cannot be empty!');
        }

        $comment->save();

        return redirect()->route('main')->with('success','Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('main')->with('success', 'Comment deleted successfully');
    }
}
