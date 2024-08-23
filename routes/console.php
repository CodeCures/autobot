<?php

use App\Jobs\InitAutobotCreationJob;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new InitAutobotCreationJob)->hourly();
