<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'genre',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'follower_movie');
    }

    public function likes(){
        return $this->belongsToMany(User::class,'movie_like')->withTimestamps();
    }
}
