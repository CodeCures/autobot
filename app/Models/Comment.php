<?php

namespace App\Models;

use App\Traits\WithOffset;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasUuids, HasFactory, WithOffset;

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
