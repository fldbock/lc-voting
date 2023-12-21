<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Idea;

class Status extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function ideas(){
        return $this->hasMany(Idea::class);
    }

    public static function getCount(){
        return Idea::query()
            ->SelectRaw("count(*) as all_statuses")
            ->SelectRaw("sum(`status_id` = 1) as open")
            ->SelectRaw("sum(`status_id` = 2) as considering")
            ->SelectRaw("sum(`status_id` = 3) as in_progress")
            ->SelectRaw("sum(`status_id` = 4) as implemented")
            ->SelectRaw("sum(`status_id` = 5) as closed")
            ->first()
            ->toArray();
    }
}
