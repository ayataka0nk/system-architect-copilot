<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);

Route::resource('projects', \App\Http\Controllers\ProjectController::class);
Route::resource('projects.estimates', \App\Http\Controllers\EstimateController::class)->shallow();
Route::resource('estimates.feature-groups', \App\Http\Controllers\FeatureGroupController::class)
    ->except(['index', 'show'])->shallow();
Route::resource('feature-groups.feature-categories', \App\Http\Controllers\FeatureCategoryController::class)
    ->except(['index', 'show'])->shallow();

Route::resource('feature-categories.features', \App\Http\Controllers\FeatureController::class)
    ->except(['index', 'show'])->shallow();

Route::middleware('auth')->get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/sandbox', [\App\Http\Controllers\SandboxController::class, 'top'])->name('sandbox');


// sample

Route::get('/counter', \App\Livewire\Counter::class);
