<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = ['name', 'email', 'password'];

    public function initials(): string
    {
        $parts = preg_split('/\s+/', trim((string) $this->name));
        $first = $parts[0] ?? '';
        $last = $parts[count($parts) - 1] ?? '';
        $initials = ($first !== '' ? mb_substr($first, 0, 1) : '')
            . ($last !== '' && $last !== $first ? mb_substr($last, 0, 1) : '');
        return mb_strtoupper($initials);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
