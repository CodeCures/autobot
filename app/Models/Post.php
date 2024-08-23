<?php

namespace App\Models;

use App\Traits\WithOffset;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUuids, HasFactory, WithOffset;
    protected $guarded = [];

    public function autobot()
    {
        return $this->belongsTo(Autobot::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
