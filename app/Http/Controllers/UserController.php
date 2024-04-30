<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function show(User $user)
    {
        $movies = $user->movies()->paginate(5);
        return view('users.show', compact('user', 'movies'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'User datas updated successfully!');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
