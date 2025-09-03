<?php

// use App\Http\Controllers\Api\CategoryTrainingController;
// use App\Http\Controllers\Api\SourceController;
// use App\Http\Controllers\Api\TrainingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('category', CategoryTrainingController::class);
// Route::apiResource('training', TrainingController::class);
// Route::apiResource('source', SourceController::class);