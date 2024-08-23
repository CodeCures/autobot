<?php

use App\Http\Controllers\StatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AutobotController;

Route::controller(AutobotController::class)->prefix('autobots')->group(function () {
    Route::get('/', 'index');
    Route::get('/{autobot}', 'show');
    Route::get('/{autobot}/posts', 'posts');
    Route::get('/{autobot}/posts/{post}', 'post');
    Route::get('/{autobot}/posts/{post}/comments', 'comments');
});

Route::get('stats', StatsController::class)->name('stats');

