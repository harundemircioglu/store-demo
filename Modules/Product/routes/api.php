<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ApiProductController;

Route::middleware(['auth'])->group(function () {
    Route::apiResource('product', ApiProductController::class);

    Route::prefix('product')->group(function(){
        Route::post('update/{id}',[ApiProductController::class,'update']);
    });
});
