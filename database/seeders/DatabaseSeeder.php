<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // admin user required by rubric
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // some regular users
        $users = User::factory()->count(5)->create();

        // categories
        $categories = Category::factory()->count(6)->create();

        // recipes (owned by random users, in random categories)
        $recipes = Recipe::factory()->count(20)->make()->each(function ($r) use ($users, $categories) {
            $r->user_id = $users->random()->id;
            $r->cat_id  = $categories->random()->id;
            $r->save();
        });

        // comments
        foreach ($recipes as $recipe) {
            Comment::factory()->count(rand(0,4))->create([
                'recipe_id' => $recipe->id,
                'user_id'   => $users->random()->id,
            ]);
        }
    }
}
