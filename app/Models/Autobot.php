<?php

namespace App\Models;

use App\Traits\WithOffset;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autobot extends Model
{
    use HasUuids, HasFactory, WithOffset;

    protected $guarded = [];

    protected $casts = [
        'address' => 'array',
        'company' => 'array',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
