<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\Category;
use App\Models\Status;
use App\Models\Comment;

use Cviebrock\EloquentSluggable\Sluggable;


class Idea extends Model
{
    use HasFactory, Sluggable;

    protected $perPage = 10;

    protected $guarded = [];

    public function user(){
        return $this->BelongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function votes(){
        return $this->BelongsToMany(User::class, 'votes');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ],
        ];
    }

    public function isVotedByUser(?User $user){
        if (!$user){
            return false;
        }

        return $this->votes()->where('user_id', $user->id)->exists();
    }

    public function toggleVote(User $user){  
        if (!$this->isVotedByUser($user)){
            $this->votes()->attach($user);
            return ;
        }
        $this->votes()->detach($user);
    }
}
