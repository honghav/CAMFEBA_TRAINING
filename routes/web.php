<?php

// use App\Http\Controllers\Api\CategoryTrainingController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\FAboutUsController;
use App\Http\Controllers\Frontend\FCategoryController;
use App\Http\Controllers\Frontend\FHomepageController;
use App\Http\Controllers\Frontend\TrianingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/local', function () {
    return view('Traning.local');
});
// Forntend Site
Route::resource('home', FHomepageController::class);
Route::resource('category', FCategoryController::class);
Route::resource('training', TrianingController::class);
Route::resource('aboutus', FAboutUsController::class);
// Backend Site
Route::resource('tablecategory', CategoryController::class);
Route::resource('tabletraining', TrainingController::class);
Route::resource('tablesource', SourceController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('category', CategoryTrainingController::class);
// Route::resource('source', SourceController::class);

require __DIR__.'/auth.php';
