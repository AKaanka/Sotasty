<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;

// Home
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/welcome', fn () => redirect()->route('home'))->name('welcome');

// ---------- Recipes: AUTH-ONLY (must come before {recipe}) ----------
Route::middleware('auth')->group(function () {
    Route::get('recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('recipes', [RecipeController::class, 'store'])->name('recipes.store');

    Route::get('recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');

    // Comments
    Route::post('recipes/{recipe}/comments', [CommentController::class, 'store'])->name('recipes.comments.store');
});

// ---------- Recipes: PUBLIC ----------
Route::get('recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');

// ---------- Categories: PUBLIC ----------
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Fortify/Livewire auth views
require __DIR__.'/auth.php';

