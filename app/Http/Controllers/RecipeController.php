<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::with('author')->get();
        return view('recipes.index', compact('recipes'));
    }
    
    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }
    //
}
