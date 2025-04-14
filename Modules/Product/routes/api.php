<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ApiProductController;

Route::prefix('product')->middleware(['auth'])->group(function () {
    Route::post('store', [ApiProductController::class, 'store']);
});
