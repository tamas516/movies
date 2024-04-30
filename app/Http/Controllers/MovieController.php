<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\CreateMovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::orderBy('title', 'ASC')->paginate(5);

        return view('main', [
            'movies' => $movies
        ]);
    }

    public function store(CreateMovieRequest $request)
    {
        $validated = $request->validated();

        Movie::create($validated);

        return redirect('/')->with('success', 'Movie added successfully!');
    }
}
