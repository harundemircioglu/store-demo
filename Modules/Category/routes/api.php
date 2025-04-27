<?php

use Illuminate\Support\Facades\Route;
use Modules\Category\Http\Controllers\ApiCategoryController;
use Modules\Category\Http\Controllers\ApiCategoryFeatureController;
use Modules\Category\Http\Controllers\ApiSubcategoryController;

Route::middleware(['auth'])->group(function () {
    Route::apiResource('category', ApiCategoryController::class);

    Route::prefix('category')->group(function () {
        Route::post('update/{id}', [ApiCategoryController::class, 'update']);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::apiResource('subcategory', ApiSubcategoryController::class);

    Route::prefix('subcategory')->group(function () {
        Route::post('update/{id}', [ApiSubcategoryController::class, 'update']);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::apiResource('category-feature', ApiCategoryFeatureController::class);

    Route::prefix('category-feature')->group(function () {
        Route::post('update/{id}', [ApiCategoryFeatureController::class, 'update']);
    });
});
