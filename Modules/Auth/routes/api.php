<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\ApiAuthController;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [ApiAuthController::class, 'login']);
    Route::post('logout', [ApiAuthController::class, 'logout']);
    Route::post('refresh', [ApiAuthController::class, 'refresh']);
    Route::post('me', [ApiAuthController::class, 'me']);
});

Route::apiResource('user', ApiAuthController::class);

Route::middleware(['api', 'auth'])->prefix('user')->group(function () {
    Route::post('update/{id}', [ApiAuthController::class, 'update']);
});
