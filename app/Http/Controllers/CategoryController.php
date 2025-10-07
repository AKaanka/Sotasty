<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::withCount('recipes')->orderBy('name')->get();
        return view('categories.index', compact('categories'));
    }
    public function show(Category $category) {
        $category->load(['recipes.user']);
        return view('categories.show', compact('category'));
    }
}

