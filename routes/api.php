<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function () {
    Route::put('/features/change-sequence', [
        App\Http\Controllers\FeatureController::class,
        'changeSequence'
    ]);

    Route::put('/feature-categories/change-sequence', [
        App\Http\Controllers\FeatureCategoryController::class,
        'changeSequence'
    ]);

    Route::put('/feature-groups/change-sequence', [
        App\Http\Controllers\FeatureGroupController::class,
        'changeSequence'
    ]);

    Route::put('/feature-categories/{featureCategory}/propose-estimated-hours', [\App\Http\Controllers\FeatureController::class, 'proposeEstimatedHours'])
        ->name('feature-categories.propose-estimated-hours');

    Route::put('/features/{feature}/approve-proposed-estimated-hours', [
        App\Http\Controllers\FeatureController::class,
        'approveProposedEstimatedHours'
    ])->name('features.approve-proposed-estimated-hours');

    Route::put('/features/{feature}/reject-proposed-estimated-hours', [
        App\Http\Controllers\FeatureController::class,
        'rejectProposedEstimatedHours'
    ])->name('features.reject-proposed-estimated-hours');
});
