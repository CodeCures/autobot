<?php

namespace App\Services;
use App\Jobs\CreateAutobotPostCommentJob;
use App\Jobs\CreateAutobotPostJob;
use App\Models\Autobot;
use App\Models\Post;

class AutobotService
{
    public static function dispatchAutobotPostCreation(Autobot $autobot, $offset = 0)
    {
        $posts = Jsonplaceholder::getPosts($offset);

        if ($posts === null)
            return;

        foreach ($posts as $post) {
            CreateAutobotPostJob::dispatch($autobot, $post);
        }
    }

    public static function dispatchAutobotPostCommentCreation(Post $post, $offset = 0)
    {
        $comments = Jsonplaceholder::getComments($offset);

        if ($comments === null)
            return;

        foreach ($comments as $comment) {
            CreateAutobotPostCommentJob::dispatch($post, $comment);
        }
    }
}
