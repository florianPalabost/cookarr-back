<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\IngredientController;
use App\Http\Controllers\Api\V1\RecipeController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('/test', function () {
        return 'test';
    });

    Route::apiResource('ingredients', IngredientController::class);

    Route::apiResource('recipes', RecipeController::class)->middleware('auth:sanctum');

    require __DIR__ . '/Auth/auth.php';
});
