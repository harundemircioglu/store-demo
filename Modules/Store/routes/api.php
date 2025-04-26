<?php

use Illuminate\Support\Facades\Route;
use Modules\Store\Http\Controllers\ApiStoreController;

Route::prefix('store')->group(function () {
    Route::post('/store', [ApiStoreController::class, 'store']);
    Route::post('/update/{id}', [ApiStoreController::class, 'update']);
});
