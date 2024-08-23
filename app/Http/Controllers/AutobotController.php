<?php

namespace App\Http\Controllers;

use App\Models\Autobot;
use App\Models\Post;

class AutobotController extends Controller
{

    public function index()
    {
        return Autobot::withOffset(request('offset'))->get();
    }

    public function show(Autobot $autobot)
    {
        return $autobot;
    }

    public function posts(Autobot $autobot)
    {
        return $autobot->posts()
            ->withOffset(request('offset'))->get();
    }

    public function post(Autobot $autobot, Post $post)
    {
        return $post;
    }

    public function comments(Autobot $autobot, Post $post)
    {
        return $post->comments()
            ->withOffset(request('offset'))->get();
    }
}
