<?php

use Illuminate\Support\Facades\Route;
use Modules\Store\Http\Controllers\StoreController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('store', StoreController::class)->names('store');
});
