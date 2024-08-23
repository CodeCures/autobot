<?php

namespace App\Http\Controllers;

use App\Models\Autobot;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return [
            'autobot_count' => Autobot::count(),
            'post_count' => Post::count(),
            'comment_count' => Comment::count(),
        ];
    }
}
