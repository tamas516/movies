<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieLikeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('main');

Route::post('/store', [MovieController::class, 'store'])->name('store');


Route::group(['middleware' => 'guest'], function () {

    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('/movies/{movie}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('/movies/{movie}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('/movies/{movie}/like', [MovieLikeController::class, 'like'])->middleware('auth')->name('movies.like');

Route::post('/movies/{movie}/unlike', [MovieLikeController::class, 'unlike'])->middleware('auth')->name('movies.unlike');

Route::get('/users/{user}/show', [UserController::class, 'show'])->middleware('auth');

Route::resource('users', UserController::class)->only('update')->middleware('auth');

Route::post('/movies/{movie}/store', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');

Route::delete('/movies/{comment}/destroy', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');
