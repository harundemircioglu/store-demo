<?php

use Illuminate\Support\Facades\Route;
use Modules\Store\Http\Controllers\ApiStoreController;

Route::middleware(['auth'])->group(function () {
    Route::apiResource('store', ApiStoreController::class);
});
