<?php

namespace App\Jobs;

use App\Models\Autobot;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateAutobotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $state;

    public function __construct(protected $autobot)
    {
        $this->state = $autobot;
    }

    public function handle()
    {
        if (Autobot::whereEmail($this->autobot->email)->exists()) {
            $this->state = collect($this->autobot)
                ->only(['address', 'company', 'website'])->toArray();
        }

        Autobot::factory()->state(
            collect($this->state)->except('id')->toArray()
        )->create();
    }
}
