<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Idea;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ideas(){
        return $this->hasMany(Idea::class);
    }

    public function votes(){
        return $this->BelongsToMany(Idea::class, 'votes');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getAvatar(){
        return 'https://www.gravatar.com/avatar/'
        .md5($this->email)
        .'?s=200'
        .'&d=robohash';
    }

    public function isAdmin(){
        return in_array($this->email, [
            'flor.debock@gmail.com',
        ]);
    }
}
