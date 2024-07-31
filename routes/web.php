<?php

declare(strict_types=1);

use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home\IndexController::class)->name('home');
