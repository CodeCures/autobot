<?php

namespace App\Jobs;

use App\Services\Jsonplaceholder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InitAutobotCreationJob implements ShouldQueue
{
    use Queueable;

    protected $hourCount = 50; // 50 * 10 = 500
    /**
     * Create a new job instance.
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $counter = 0;

        while ($counter < $this->hourCount) {

            $users = Jsonplaceholder::getUsers();

            if ($users === null)
                return;

            foreach ($users as $user) {
                CreateAutobotJob::dispatch($user);
            }

            $counter++;
        }
    }
}
