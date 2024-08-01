<?php

declare(strict_types=1);

use App\Http\Controllers\Home;
use App\Http\Controllers\People;
use Illuminate\Support\Facades\Route;

Route::get('/', Home\IndexController::class)->name('home');

Route::prefix('people')->as('people.')->group(function () {
    Route::post('/store', People\StoreController::class)->name('store');
});
