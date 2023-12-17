<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\User;
use App\Models\Category;
use App\Models\Status;

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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ],
        ];
    }
}
