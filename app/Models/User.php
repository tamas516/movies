<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'follower_movie');
    }

    public function followings()
    {
        return $this->belongsToMany(Movie::class, 'follower_movie', 'user_id', 'movie_id')->withTimestamps();
    }

    public function follows(Movie $movie)
    {
        return $this->followings()->where('movie_id', $movie->id)->exists();
    }

    public function likes(){
        return $this->belongsToMany(Movie::class,'movie_like')->withTimestamps();
    }

    public function likesMovie(Movie $movie){
        return $this->likes()->where('movie_id',$movie->id)->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
