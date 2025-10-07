<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\Settings\Profile as SettingsProfile;
use App\Livewire\Settings\Password as SettingsPassword;
use App\Livewire\Settings\Appearance as SettingsAppearance;
use App\Livewire\Settings\TwoFactor as SettingsTwoFactor;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::redirect('/home', '/')->name('home');

// Dashboard route expected by tests and Fortify home path
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))
        ->name('dashboard');
});

Route::resource('recipes', RecipeController::class)
    ->only(['index','show']); // public

Route::resource('recipes', RecipeController::class)
    ->only(['create','store','edit','update','destroy'])
    ->middleware('auth'); // protected

// Comments on recipes (authenticated)
Route::middleware(['auth'])->group(function () {
    Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->name('recipes.comments.store');
});

// Categories
Route::resource('categories', CategoryController::class)->only(['index','show']);

// Settings routes used in views
Route::middleware(['auth'])->group(function () {
    Route::get('/settings/profile', SettingsProfile::class)->name('settings.profile');
    Route::get('/settings/password', SettingsPassword::class)->name('settings.password');
    Route::get('/settings/appearance', SettingsAppearance::class)->name('settings.appearance');
    Route::get('/settings/two-factor', SettingsTwoFactor::class)
        ->middleware('password.confirm')
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
