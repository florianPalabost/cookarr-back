<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientRecipe;
use App\Models\Recipe;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name'  => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Ingredient::factory(10)->create();

        $recipes = Recipe::factory(10)->create();

        $recipes->each(function (Recipe $recipe) {
            $recipe->ingredients()->saveMany(Ingredient::factory(5)->make());
        });

        // IngredientRecipe::factory(10)->create();
    }
}
