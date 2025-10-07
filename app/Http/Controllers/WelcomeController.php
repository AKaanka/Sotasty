<?php

namespace App\Http\Controllers;

use App\Models\Recipe;


class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch the latest 3 recipes from the database
        $latestRecipes = Recipe::latest()->take(4)->get();

        // Return the welcome view with the data
        return view('welcome', compact('latestRecipes'));
}
}