<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

Route::get('/', fn() => redirect()->route('recipes.index'))->name('home');

Route::resource('recipes', RecipeController::class);
// Comments on recipes
Route::post('recipes/{recipe}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('recipes.comments.store');

// Categories
Route::resource('categories', CategoryController::class)->only(['index','show']);
