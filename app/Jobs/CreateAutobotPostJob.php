<?php

namespace App\Jobs;

use App\Models\Autobot;
use App\Models\Post;
use App\Services\Jsonplaceholder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateAutobotPostJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Autobot $autobot, protected $post)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $post = [
            'autobot_id' => $this->autobot->id,
            'body' => $this->post->body
        ];

        if (!Post::whereTitle($this->post->title)->exists()) {
            $post['title'] = $this->post->title;
        }

        Post::factory()->state($post)->create();
    }
}
