<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\IngredientUnitEnum;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IngredientRecipe>
 */
class IngredientRecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id'     => Recipe::factory(),
            'ingredient_id' => Ingredient::factory(),
            'quantity'      => fake()->randomFloat(1, 1, 500),
            'unit'          => fake()->randomElement(IngredientUnitEnum::values()),
            'note'          => fake()->optional()->sentence(),
            'position'      => fake()->numberBetween(1, 10),
        ];
    }
}
