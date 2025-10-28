<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Ingredient;
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

        $recipes = Recipe::factory(100)->create();

        $recipes->each(function (Recipe $recipe) {
            $ingredientsCount = random_int(5, 12);
            $recipe->ingredients()->saveMany(Ingredient::factory($ingredientsCount)->make());
        });
    }
}
