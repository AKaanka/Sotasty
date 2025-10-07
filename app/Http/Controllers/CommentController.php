<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Recipe $recipe)
    {
        $data = $request->validate([
            'content' => ['required','string','min:2','max:1000'],
        ]);

        Comment::create([
            'recipe_id' => $recipe->id,
            'user_id' => $request->user()->id,
            'content' => $data['content'],
        ]);

        return redirect()->route('recipes.show', $recipe)
            ->with('success', 'Comment posted');
    }
}
