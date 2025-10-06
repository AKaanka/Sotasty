<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'cat_id'     => Category::factory(),
            'title'      => $this->faker->sentence(6),
            'description'=> $this->faker->paragraphs(3, true),
        ];
    }
}
