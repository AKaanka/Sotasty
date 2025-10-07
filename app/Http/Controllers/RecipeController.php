<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class RecipeController extends Controller {

    

    public function index()
    {
        $recipes = Recipe::with(['user','category'])->latest()->paginate(9);
        return view('recipes.index', compact('recipes'));
    }

    public function show(Recipe $recipe)
    {
        $recipe->load(['user','category','comments.user']);
        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('recipes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required','string','min:3','max:100'],
            'description' => ['required','string','min:10'],
            'cat_id'      => ['required','exists:categories,id'],
        ]);

        $recipe = Recipe::create($data + ['user_id' => $request->user()->id]);

        return redirect()->route('recipes.show', $recipe)
            ->with('success', 'Recipe created!');
    }

    public function edit(Recipe $recipe)
    {
        abort_unless($recipe->isOwnedBy(auth()->user()) || auth()->user()->email === 'admin@admin.com', 403);
        $categories = Category::orderBy('name')->get();
        return view('recipes.edit', compact('recipe','categories'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        abort_unless($recipe->isOwnedBy(auth()->user()) || auth()->user()->email === 'admin@admin.com', 403);

        $data = $request->validate([
            'title'       => ['required','string','min:3','max:100'],
            'description' => ['required','string','min:10'],
            'cat_id'      => ['required','exists:categories,id'],
        ]);

        $recipe->update($data);

        return redirect()->route('recipes.show', $recipe)
            ->with('success', 'Recipe updated!');
    }

    public function destroy(Recipe $recipe)
    {
        abort_unless($recipe->isOwnedBy(auth()->user()) || auth()->user()->email === 'admin@admin.com', 403);

        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted.');
    }
}
