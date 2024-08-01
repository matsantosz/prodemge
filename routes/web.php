<?php

declare(strict_types=1);

use App\Http\Controllers\Home;
use App\Http\Controllers\People;
use App\Http\Controllers\Address;
use Illuminate\Support\Facades\Route;

Route::get('/', Home\IndexController::class)->name('home');

Route::prefix('people')->as('people.')->group(function () {
    Route::post('/store', People\StoreController::class)->name('store');
});

Route::prefix('address')->as('address.')->group(function () {
    Route::post('/store', Address\StoreController::class)->name('store');
    Route::patch('/{person}/update', Address\UpdateController::class)->name('update');
});
