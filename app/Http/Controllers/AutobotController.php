<?php

namespace App\Http\Controllers;

use App\Models\Autobot;
use App\Models\Post;

class AutobotController extends Controller
{

    /**
     * @queryParam offset Field determine where to start selecting data from. Defaults to '0'
     */
    public function index()
    {
        return Autobot::withOffset(request('offset'))->get();
    }


    public function show(Autobot $autobot)
    {
        return $autobot;
    }

    /**
     * @queryParam offset Field determine where to start selecting data from. Defaults to '0'
     */
    public function posts(Autobot $autobot)
    {
        return $autobot->posts()
            ->withOffset(request('offset'))->get();
    }

    public function post(Autobot $autobot, Post $post)
    {
        return $post;
    }

    /**
     * @queryParam offset Field determine where to start selecting data from. Defaults to '0'
     */
    public function comments(Autobot $autobot, Post $post)
    {
        return $post->comments()
            ->withOffset(request('offset'))->get();
    }
}
