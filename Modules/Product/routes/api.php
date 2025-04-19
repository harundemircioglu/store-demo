<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ApiProductController;

Route::middleware(['auth'])->group(function () {
    Route::apiResource('product', ApiProductController::class);
});
