<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /** @use HasFactory<\Database\Factories\RecipeFactory> */
    use HasFactory;
    protected $fillable = ['user_id','cat_id','title','description'];

    public function user()     { return $this->belongsTo(User::class); }
    public function category() { return $this->belongsTo(Category::class, 'cat_id'); }
    public function comments() { return $this->hasMany(Comment::class); }

    // convenience for ownership checks
    public function isOwnedBy(?\App\Models\User $user): bool
    {
        return $user && $user->id === $this->user_id;
    }
}
