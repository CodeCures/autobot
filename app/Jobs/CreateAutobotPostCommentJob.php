<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateAutobotPostCommentJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Post $post, protected $comment)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->comment->post_id = $this->post->id;

        Comment::factory()->state(
            collect($this->comment)->except(['id', 'postId'])->toArray()
        )->create();
    }
}
