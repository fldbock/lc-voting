<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Idea;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ideas(){
        return $this->hasMany(Idea::class);
    }
}
