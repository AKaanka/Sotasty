<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Public pages + auth-protected pages. We split the Recipe resource so
| index/show are public, and create/store/edit/update/destroy require login.
| Route model binding will inject Recipe/Category automatically.
*/

/**
 * Home (welcome) page — shows latest recipes (your WelcomeController already does this).
 */Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/welcome', fn () => redirect()->route('home'))->name('welcome');

/**
 * Recipes — PUBLIC part (anyone can browse and read)
 *   GET /recipes           -> recipes.index
 *   GET /recipes/{recipe}  -> recipes.show
 */
Route::resource('recipes', RecipeController::class)
    ->only(['index', 'show']); // your controller has these methods already 

/**
 * Recipes — AUTH-ONLY part (create/edit/update/delete)
 *   GET    /recipes/create        -> recipes.create
 *   POST   /recipes               -> recipes.store
 *   GET    /recipes/{recipe}/edit -> recipes.edit
 *   PUT    /recipes/{recipe}      -> recipes.update
 *   DELETE /recipes/{recipe}      -> recipes.destroy
 */
Route::middleware('auth')->group(function () {
    Route::resource('recipes', RecipeController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']); // your controller already checks owner/admin in edit/update/destroy 

    /**
     * Comments — add a comment to a recipe (auth required)
     *   POST /recipes/{recipe}/comments  -> recipes.comments.store
     */
    Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])
        ->name('recipes.comments.store'); // your CommentController@store already matches this signature 
});

/**
 * Categories — PUBLIC
 *   GET /categories               -> categories.index
 *   GET /categories/{category}    -> categories.show
 */
Route::resource('categories', CategoryController::class)
    ->only(['index', 'show']); // your CategoryController has index/show implemented 

/**
 * (Optional) include auth scaffolding routes if your project uses them.
 * In your repo you already have routes/auth.php; keep this require in place.
 */
require __DIR__.'/auth.php';

