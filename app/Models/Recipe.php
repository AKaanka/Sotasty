<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    // Use 'cat_id' to match your ERD. If your migration used 'category_id', switch this and $fillable.
    protected $fillable = ['user_id', 'cat_id', 'title', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // simple helper for ownership checks
    public function isOwnedBy(User $user): bool
    {
        return $this->user_id === $user->id;
    }
}

