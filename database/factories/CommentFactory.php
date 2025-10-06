<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::factory(),
            'user_id'   => User::factory(),
            'content'   => $this->faker->sentences(2, true),
        ];
    }
}
